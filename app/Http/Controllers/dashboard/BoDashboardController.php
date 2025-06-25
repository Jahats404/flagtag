<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\BrandOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoDashboardController extends Controller
{
    public function index()
    {
        $cekKelengkapan = BrandOwner::where('user_id', Auth::id())->first();
        $lengkap = $cekKelengkapan &&
            !empty($cekKelengkapan->nama_perusahaan) &&
            !empty($cekKelengkapan->alamat_perusahaan) &&
            !empty($cekKelengkapan->status);
        // dd($lengkap);
        return view('bo.dashboard.index', compact('lengkap'));
    }
}