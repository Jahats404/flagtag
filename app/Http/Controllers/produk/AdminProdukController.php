<?php

namespace App\Http\Controllers\produk;

use App\Http\Controllers\Controller;
use App\Models\BrandOwner;
use App\Models\Hologram;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        return view('admin.produk.index',compact('produk'));
    }

    public function produk($id)
    {
        $decryptedId = decrypt_id($id);

        $brandOwner = BrandOwner::find($decryptedId);
        $produk = Produk::where('perusahaan_id',$decryptedId)->get();

        return view('admin.users.brand-owner.produk', compact('produk', 'brandOwner'));
    }

    public function kepemilikanProduk()
    {
        $kepemilikanProduk = Hologram::whereNotNull('customer_claim_id')
                ->orderBy('created_at', 'asc')
                ->get();

        return view('admin.produk.kepemilikan-produk', compact('kepemilikanProduk'));
    }
}