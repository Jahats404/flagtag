<?php

namespace App\Http\Controllers\token;

use App\Http\Controllers\Controller;
use App\Models\Hologram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerTokenController extends Controller
{
    public function index()
    {
        $customer = Auth::user()->customer;
            
        $riwayatScan = Hologram::where('customer_claim_id', $customer->id_customer)
                ->orderBy('created_at', 'asc')
                ->get();

        $totalToken = Hologram::query()
                ->join('batch_produk', 'batch_produk.id_batch_produk', '=', 'hologram.batch_produk_id')
                ->where('hologram.customer_claim_id', $customer->id_customer)
                ->sum('batch_produk.nominal_token');

        $hologram = null; // In case you need to pass it to the view, but not used in this method
    
            return view('customer.token.index', compact('customer', 'riwayatScan', 'totalToken', 'hologram'));
    }

    public function indexWithCode($kode)
    {
        if (!Auth::check()) {
            // dd('asd');
            return redirect()->route('login.customer', ['kode' => $kode])
                ->with('error', 'Anda harus login terlebih dahulu untuk Klaim Token.');
        } 

        $customer = Auth::user()->customer;

        $hologram = Hologram::where('kode_hologram', decrypt_id($kode))->first();
        
        $riwayatScan = Hologram::where('customer_claim_id', $customer->id_customer)
                ->orderBy('created_at', 'asc')
                ->get();

        $totalToken = Hologram::query()
                ->join('batch_produk', 'batch_produk.id_batch_produk', '=', 'hologram.batch_produk_id')
                ->where('hologram.customer_claim_id', $customer->id_customer)
                ->sum('batch_produk.nominal_token');

        return view('customer.token.index', compact('customer', 'riwayatScan', 'totalToken','hologram'));

    }

    // public function klaimToken(Request $request, $kode)
    // {
    //     $hologram = Hologram::where('kode_hologram', decrypt_id($kode))->first();
    //     if (!$hologram) {
    //         return redirect()->back()->with('error', 'Kode Hologram tidak valid.');
    //     }

    //     $customer = Auth::user()->customer;
    //     if ($hologram->customer_claim_id != $customer->id_customer) {
    //         return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk klaim token ini.');
    //     }

    //     $hologram->customer_claim_id = $customer->id_customer;
    //     $hologram->status = 'Claimed';
    //     $hologram->save();

    //     return redirect()->route('customer.token.index', ['kode' => encrypt_id($hologram->kode_hologram)])
    //         ->with('success', 'Token berhasil diklaim.');
    // }

    public function klaimToken(Request $request, $kode)
    {
        try {
            $hologram = Hologram::where('kode_hologram', decrypt_id($kode))->first();

            if (!$hologram) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kode Hologram tidak valid.',
                ], 404);
            }

            $customer = Auth::user()->customer;

            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda belum login sebagai customer.',
                ], 401);
            }

            $hologram->customer_claim_id = $customer->id_customer;
            $hologram->status_token = 'Claimed';
            $hologram->save();

            return response()->json([
                'success' => true,
                'message' => 'Token berhasil diklaim.' . $hologram->kode_hologram,
                'redirect_url' => route('c.token.with.kode', ['kode' => encrypt_id($hologram->kode_hologram)]),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
}