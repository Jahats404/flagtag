<?php

namespace App\Http\Controllers\hologram;

use App\Http\Controllers\Controller;
use App\Models\Hologram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BoHologramController extends Controller
{
    public function cetak($id)
    {
        $decryptedId = decrypt_id($id);
        $hologram = Hologram::with('batchProduk.produk')->findOrFail($decryptedId);
        return view('hologram.index', compact('hologram'));
    }


    public function verifikasi($kode)
    {
        $decryptedKode = decrypt_id($kode);
        $hologram = Hologram::where('kode_hologram', $decryptedKode)->first();

        if (!$hologram) {
            abort(404, 'Kode Hologram tidak ditemukan');
        }

        if ($hologram->status !== 'Active') {
            return view('hologram.invalid', [
                'hologram' => $hologram
            ]);
        }

        // Tandai sebagai sudah diverifikasi
        $hologram->updated_at = now(); // waktu verifikasi
        $hologram->status = 'Claimed';
        $hologram->save();

        return view('hologram.valid', compact('hologram'));
    }

    // public function simpanLokasi(Request $request)
    // {

    //     $hologram = Hologram::where('kode_hologram', $request->kode_hologram)->first();

    //     $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
    //         'latlng' => "{$request->latitude},{$request->longitude}",
    //         'key' => env('GOOGLE_MAPS_API_KEY'),
    //     ]);

    //     $data = $response->json();

    //     if (isset($data['results'][0]['formatted_address'])) {
    //         $lokasi_scan = $data['results'][0]['formatted_address'];
    //     } else {
    //         $lokasi_scan = null;
    //     }

    //     if (!$hologram) {
    //         return response()->json(['message' => 'Kode hologram tidak ditemukan'], 404);
    //     }

    //     $hologram->lokasi_scan = $lokasi_scan;
    //     $hologram->save();

    //     return response()->json(['message' => 'Lokasi berhasil disimpan']);
    // }
    public function simpanLokasi(Request $request)
    {
        // Validasi request
        $validated = $request->validate([
            'kode_hologram' => 'required|string',
            'latitude'      => 'required|numeric',
            'longitude'     => 'required|numeric',
        ]);

        // Cari hologram
        $hologram = Hologram::where('kode_hologram', $validated['kode_hologram'])->first();

        if (!$hologram) {
            return response()->json([
                'success' => false,
                'message' => 'Kode hologram tidak ditemukan',
            ], 404);
        }
        if ($hologram->lokasi_scan) {
            return response()->json([
                'success' => 'success',
                'message' => 'Kode sudah pernah discan',
            ], 200);
        }

        try {
            // Request ke Nominatim reverse geocoding
            $response = Http::withHeaders([
                'User-Agent' => 'flagtag/1.0'
            ])->get('https://nominatim.openstreetmap.org/reverse', [
                'format'          => 'json',
                'lat'             => $validated['latitude'],
                'lon'             => $validated['longitude'],
                'zoom'            => 18,
                'addressdetails'  => 1,
            ]);

            if ($response->successful()) {
                $lokasi_scan = optional($response->json())['display_name'] ?? null;
            } else {
                $lokasi_scan = null;
            }

            $hologram->lokasi_scan = $lokasi_scan;
            $hologram->save();

            return response()->json([
                'success'       => true,
                'message'       => 'Lokasi berhasil disimpan',
                'lokasi_scan'   => $lokasi_scan,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil lokasi',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

}