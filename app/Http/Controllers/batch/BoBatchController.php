<?php

namespace App\Http\Controllers\batch;

use App\Http\Controllers\Controller;
use App\Models\BatchProduk;
use App\Models\Hologram;
use App\Models\Produk;
use App\Models\RefreshToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BoBatchController extends Controller
{
    public function index($id)
    {
        $cekToken = RefreshToken::where('user_id', Auth::user()->id)->first();
        // dd($cekToken);
        $decryptedId = decrypt_id($id);

        $produk = Produk::findOrFail($decryptedId);
        $batchProduk = BatchProduk::where('produk_id', $decryptedId)->get();

        return view('bo.produk.batch-produk', compact('produk', 'batchProduk'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'no_batch_produk' => 'required|string|max:255',
                'tanggal_produksi' => 'required|date',
                'tanggal_kadaluarsa' => 'required|date|after:tanggal_produksi',
                'tempat_produksi' => 'required|string|max:255',
                'quantity' => 'required|integer|min:1',
                'nominal_token' => 'nullable|integer|min:0',
                'produk_id' => 'required|exists:produk,id_produk',
            ],
            [
                'no_batch_produk.required' => 'Nomor batch produk harus diisi.',
                'tanggal_produksi.required' => 'Tanggal produksi harus diisi.',
                'tanggal_kadaluarsa.required' => 'Tanggal kadaluarsa harus diisi.',
                'tanggal_kadaluarsa.after' => 'Tanggal kadaluarsa harus setelah tanggal produksi.',
                'tempat_produksi.required' => 'Tempat produksi harus diisi.',
                'quantity.required' => 'Jumlah produk harus diisi.',
                'nominal_token.integer' => 'Nominal token harus berupa angka.',
                'produk_id.required' => 'Produk harus dipilih.',
                'produk_id.exists' => 'Produk yang dipilih tidak valid.',
            ]
        );

        try {
            DB::beginTransaction();

            $idBatchProduk = uniqid('batch_');

            // refresh token
            $getRefreshToken = RefreshToken::where('user_id', Auth::user()->id)->first();
            if (!$getRefreshToken) {
                return redirect()->back()->withErrors(['error' => 'Refresh token tidak ditemukan.']);
            }

            $refreshToken = $getRefreshToken->token;

            $refresh = Http::withHeaders([
                'Authorization' => 'Bearer ' . $refreshToken,
            ])->post('http://localhost:3000/api/auth/v1/refresh-token');

            if ($refresh->failed()) {
                DB::rollBack();
                \Log::error("Failed to refresh JWT: " . $refresh->body());
                return redirect()->back()->withErrors(['error' => 'Gagal refresh token.']);
            }

            $jwtToken = $refresh->json('data')['access_token'];

            // simpan batchProduk dulu DI DALAM transaction
            $batchProduk = BatchProduk::create([
                'id_batch_produk' => $idBatchProduk,
                'no_batch_produk' => $request->no_batch_produk,
                'tanggal_produksi' => $request->tanggal_produksi,
                'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
                'tempat_produksi' => $request->tempat_produksi,
                'quantity' => $request->quantity,
                'status' => 'Pending',
                'nominal_token' => $request->nominal_token,
                'produk_id' => $request->produk_id,
            ]);

            for ($i = 0; $i < $request->quantity; $i++) {
                $id_hologram = Str::uuid()->toString();
                $kode_hologram = 'Holo-' . strtoupper(Str::uuid()->toString());

                $qrImage = QrCode::format('png')
                    ->size(300)
                    ->errorCorrection('H')
                    ->generate($kode_hologram);

                $base64 = base64_encode($qrImage);

                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $jwtToken,
                ])->post('http://localhost:3000/api/brand-owner/v1/product/batch/upload-ipfs', [
                    'kode_hologram' => $kode_hologram,
                    'qr_base64' => $base64,
                ]);

                if ($response->failed()) {
                    DB::rollBack();
                    \Log::error("Failed send QR to Node.js: " . $response->body());
                    return redirect()->back()->withErrors(['error' => 'Gagal kirim QR ke Node.js']);
                }

                $ipfsHash = $response->json('data.ipfsHash');

                Hologram::create([
                    'id_hologram' => $id_hologram,
                    'kode_hologram' => $kode_hologram,
                    'ipfs_url' => $ipfsHash,
                    'status' => 'Active',
                    'status_token' => 'Active',
                    'lokasi_scan' => null,
                    'batch_produk_id' => $idBatchProduk,
                ]);
            }

            DB::commit();

            return redirect()->route('bo.batch', ['id' => encrypt_id($request->produk_id)])
                ->with('success', 'Batch produk berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error store batch produk: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $decryptedId = decrypt_id($id);
        $batchProduk = BatchProduk::findOrFail($decryptedId);

        // Delete all holograms associated with this batch
        Hologram::where('batch_produk_id', $batchProduk->id_batch_produk)->delete();

        // Delete the batch produk
        $batchProduk->delete();

        return redirect()->route('bo.batch', ['id' => encrypt_id($batchProduk->produk_id)])
            ->with('success', 'Batch produk berhasil dihapus.');
    }


    public function detail($id)
    {
        $decryptedId = decrypt_id($id);
        $batchProduk = BatchProduk::findOrFail($decryptedId);
        $holograms = Hologram::where('batch_produk_id', $batchProduk->id_batch_produk)->get();

        return view('bo.produk.detail-batch', compact('batchProduk', 'holograms'));
    }
}