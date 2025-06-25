<?php

namespace App\Http\Controllers\batch;

use App\Http\Controllers\Controller;
use App\Models\BatchProduk;
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
        
    }
}