<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::all();

        return view('admin.users.accounts', compact('roles', 'users'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'role_id' => 'required|exists:roles,id_role',
            ],
            [
                'nama.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'role_id.required' => 'Role wajib dipilih.',
                'role_id.exists' => 'Role yang dipilih tidak valid.',]
        );

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        if ($request->role_id == '2') {
            $random4 = mt_rand(1000, 9999);
            $timestamp = Carbon::now()->format('YmdHis');
            $user = User::where('email', $request->email)->first();
            $user->brandOwner()->create([
                'id_perusahaan' => 'BO' . $timestamp . $random4,
                'nama_perusahaan' => $request->nama,
                'user_id' => $user->id,
            ]);
        } elseif ($request->role_id == '3') {
            $random4 = mt_rand(1000, 9999);
            $timestamp = Carbon::now()->format('YmdHis');
            $user = User::where('email', $request->email)->first();
            $user->customer()->create([
                'id_customer' => 'CUST' . $timestamp . $random4,
                'nama_lengkap' => $request->nama,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('admin.users')->with('success', 'Akun berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $decryptedId = decrypt_id($id);
        $user = User::findOrFail($decryptedId);

        $request->validate(
            [
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'role_id' => 'required|exists:roles,id_role',
                'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed'],
            ],
            [
                'nama.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'role_id.required' => 'Role wajib dipilih.',
                'role_id.exists' => 'Role yang dipilih tidak valid.',
                'password.min' => 'Password minimal harus 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]
        );

        if ($request->role_id == '2') {
            $user->brandOwner()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'nama_perusahaan' => $request->nama,
                ]
            );
        } elseif ($request->role_id == '3') {
            $user->customer()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'nama_lengkap' => $request->nama,
                ]
            );
        }

        $user->email = $request->email;
        $user->role_id = $request->role_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users')->with('success', 'Akun berhasil diperbarui.');
    }

    public function delete($id)
    {
        $decryptedId = decrypt_id($id);
        $user = User::findOrFail($decryptedId);

        // Hapus relasi Brand Owner jika ada
        if ($user->brandOwner) {
            $user->brandOwner()->delete();
        }

        // Hapus relasi Customer jika ada
        if ($user->customer) {
            $user->customer()->delete();
        }

        // Hapus user
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Akun berhasil dihapus.');
    }
}