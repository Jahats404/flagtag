<?php

namespace App\Http\Controllers\batch;

use App\Http\Controllers\Controller;
use App\Models\BatchProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminBatchController extends Controller
{
    public function index($id)
    {
        $decryptedId = decrypt_id($id);

        $produk = Produk::findOrFail($decryptedId);
        $batchProduk = BatchProduk::where('produk_id', $decryptedId)->get();

        return view('admin.produk.batch-produk', compact('produk', 'batchProduk'));
    }

    public function updateStatus(Request $request, $id)
    {
        $decryptedId = decrypt_id($id);

        if (!$decryptedId) {
            return redirect()->back()->withErrors(['error' => 'Batch tidak valid.']);
        }

        $batch = BatchProduk::find($decryptedId);
        $batch->status = $request->status;
        $batch->save();

        return redirect()->route('admin.batch',['id' => encrypt_id($batch->produk->id_produk)])->with('success', 'Status berhasil diubah menjadi ' . $request->status);
    }
}