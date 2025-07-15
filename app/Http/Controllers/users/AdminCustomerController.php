<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('admin.users.customer.index', compact('customers'));
    }

    public function update(Request $request, $id)
    {
        $decryptedId = decrypt_id($id);
        $request->validate(
            [
                'nama_lengkap' => 'required|string|max:255',
            ],
            [
                'nama_lengkap.required' => 'Nama Lengkap wajib diisi.',
                'nama_lengkap.string' => 'Nama Lengkap harus berupa string.',
                'nama_lengkap.max' => 'Nama Lengkap maksimal 255 karakter.',
            ]
        );

        $customer = Customer::findOrFail($decryptedId);
        $customer->update($request->only('nama_lengkap'));

        return redirect()->route('admin.customer')->with('success', 'Data berhasil diperbarui.');
    }
}