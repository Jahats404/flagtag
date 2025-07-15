<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\BrandOwner;
use Illuminate\Http\Request;

class AdminBrandOwnerController extends Controller
{
    public function index()
    {
        $brandOwners = BrandOwner::all();

        return view('admin.users.brand-owner.index', compact('brandOwners'));
    }

    public function update(Request $request, $id)
    {
        $decryptedId = decrypt_id($id);
        $request->validate(
            [
            'nama_perusahaan' => 'required|string|max:255',
            'alamat_perusahaan' => 'nullable|string|max:255',
            ],
            [
                'nama_perusahaan.required' => 'Nama Perusahaan wajib diisi.',
                'nama_perusahaan.string' => 'Nama Perusahaan harus berupa string.',
                'nama_perusahaan.max' => 'Nama Perusahaan maksimal 255 karakter.',
                'alamat_perusahaan.string' => 'Alamat Perusahaan harus berupa string.',
                'alamat_perusahaan.max' => 'Alamat Perusahaan maksimal 255 karakter.',
            ]
    );

        $brandOwner = BrandOwner::findOrFail($decryptedId);
        $brandOwner->update($request->only('nama_perusahaan', 'alamat_perusahaan'));

        return redirect()->route('admin.brandowner')->with('success', 'Data berhasil diperbarui.');
    }

}