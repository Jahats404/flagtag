<?php

namespace App\Http\Controllers\batch;

use App\Http\Controllers\Controller;
use App\Models\BatchProduk;
use App\Models\Hologram;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BoBatchController extends Controller
{
    public function index($id)
    {
        $decryptedId = decrypt_id($id);

        $produk = Produk::findOrFail($decryptedId);
        $batchProduk = BatchProduk::where('produk_id', $decryptedId)->get();

        return view('bo.produk.batch-produk', compact('produk', 'batchProduk'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
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

        $idBatchProduk = uniqid('batch_');

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

        // $batchProduk = new BatchProduk();
        // $batchProduk->id_batch_produk = uniqid('batch_');
        // $batchProduk->no_batch_produk = $request->no_batch_produk;
        // $batchProduk->tanggal_produksi = $request->tanggal_produksi;
        // $batchProduk->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        // $batchProduk->tempat_produksi = $request->tempat_produksi;
        // $batchProduk->quantity = $request->quantity;
        // $batchProduk->status = 'Pending';
        // $batchProduk->nominal_token = $request->nominal_token;
        // $batchProduk->produk_id = $request->produk_id;
        // $batchProduk->save();

        if (!$batchProduk) {
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan batch produk.']);
        }

        $hologram = new Hologram();
        for ($i=0; $i < $request->quantity; $i++) { 
            $hologram->create([
                'id_hologram' => uniqid('holo_'),
                'kode_hologram' => 'Holo-' . strtoupper(uniqid()),
                'hologram_image' => null, // Assuming you will handle image upload separately
                'status' => 'Active', // Default status
                'status_token' => 'Active', // Default status
                'lokasi_scan' => null,
                'batch_produk_id' => $idBatchProduk,
            ]);
        }

        return redirect()->route('bo.batch', ['id' => encrypt_id($request->produk_id)])
            ->with('success', 'Batch produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $decryptedId = decrypt_id($id);
        // dd($decryptedId);
        $batchProduk = BatchProduk::findOrFail($decryptedId);
        // dd($batchProduk);
        // dd(encrypt_id($batchProduk->produk_id));    

        $request->validate(
            [
                'no_batch_produk' => 'required|string|max:255',
                'tanggal_produksi' => 'required|date',
                'tanggal_kadaluarsa' => 'required|date|after:tanggal_produksi',
                'tempat_produksi' => 'required|string|max:255',
                'quantity' => 'required|integer|min:1',
                'nominal_token' => 'nullable|integer|min:0',
            ],
            [
                'no_batch_produk.required' => 'Nomor batch produk harus diisi.',
                'tanggal_produksi.required' => 'Tanggal produksi harus diisi.',
                'tanggal_kadaluarsa.required' => 'Tanggal kadaluarsa harus diisi.',
                'tanggal_kadaluarsa.after' => 'Tanggal kadaluarsa harus setelah tanggal produksi.',
                'tempat_produksi.required' => 'Tempat produksi harus diisi.',
                'quantity.required' => 'Jumlah produk harus diisi.',
                'nominal_token.integer' => 'Nominal token harus berupa angka.',
            ]
        );

        $batchProduk->update([
            'no_batch_produk' => $request->no_batch_produk,
            'tanggal_produksi' => $request->tanggal_produksi,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'tempat_produksi' => $request->tempat_produksi,
            // 'quantity' => $request->quantity,
            'status' => $request->status ?? $batchProduk->status,
            'nominal_token' => $request->nominal_token,
        ]);
        

        return redirect()->route('bo.batch', ['id' => encrypt_id($batchProduk->produk_id)])
            ->with('success', 'Batch produk berhasil diperbarui.');
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