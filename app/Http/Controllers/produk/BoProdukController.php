<?php

namespace App\Http\Controllers\produk;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BoProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        return view('bo.produk.index', compact('produk'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
    [
                'nama_produk' => 'required|string|max:255',
                'nomor_sku' => 'required|string|max:255',
                'kategori_produk' => 'required|string|max:255',
                'komposisi_produk' => 'required|string|max:255',
                'deskripsi' => 'nullable|string|max:1000',
            ],
            [
                'nama_produk.required' => 'Nama produk harus diisi.',
                'nomor_sku.required' => 'Nomor SKU harus diisi.',
                'kategori_produk.required' => 'Kategori produk harus diisi.',
                'komposisi_produk.required' => 'Komposisi produk harus diisi.',
                'deskripsi.max' => 'Deskripsi produk tidak boleh lebih dari 1000 karakter',
            ]);

        $produk = Produk::create([
            'id_produk' => uniqid('prdct_'),
            'nama_produk' => $request->nama_produk,
            'nomor_sku' => $request->nomor_sku,
            'kategori_produk' => $request->kategori_produk,
            'komposisi_produk' => $request->komposisi_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
        ]);
        

        return redirect()->route('bo.produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $decryptedId = decrypt_id($id);

        $request->validate(
            [
                'nama_produk' => 'required|string|max:255',
                'nomor_sku' => 'required|string|max:255',
                'kategori_produk' => 'required|string|max:255',
                'komposisi_produk' => 'required|string|max:255',
                'deskripsi_produk' => 'nullable|string|max:1000',
            ],
            [
                'nama_produk.required' => 'Nama produk harus diisi.',
                'nomor_sku.required' => 'Nomor SKU harus diisi.',
                'kategori_produk.required' => 'Kategori produk harus diisi.',
                'komposisi_produk.required' => 'Komposisi produk harus diisi.',
                'deskripsi_produk.max' => 'Deskripsi produk tidak boleh lebih dari 1000 karakter',
            ]);

        $produk = Produk::findOrFail($decryptedId);

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'nomor_sku' => $request->nomor_sku,
            'kategori_produk' => $request->kategori_produk,
            'komposisi_produk' => $request->komposisi_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
        ]);

        return redirect()->route('bo.produk')->with('success', 'Produk berhasil diperbarui.');
    }

    public function delete($id)
    {
        $decryptedId = decrypt_id($id);

        $produk = Produk::findOrFail($decryptedId);
        $produk->delete();

        return redirect()->route('bo.produk')->with('success', 'Produk berhasil dihapus.');
    }
}