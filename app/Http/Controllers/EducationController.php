<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EducationController extends Controller
{
    public function index()
    {
        $videos = Modul::all();
        return view('education',compact('videos'));
    }

    public function crud()
    {
        $videos = Modul::all();
        return view('admin.bitcoin.crud',compact('videos'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_modul'  => 'required|string|max:255',
                // 'video'       => 'required|string',
                'price'       => 'required|integer|min:0',
                'status'      => 'required|in:Locked,Available', // sesuaikan dengan pilihan yang kamu gunakan
            ],
            [
                'id_modul.required'   => 'ID modul wajib diisi.',
                'id_modul.unique'     => 'ID modul sudah terdaftar.',
                'nama_modul.required' => 'Nama modul wajib diisi.',
                'video.required'      => 'Link atau embed video wajib diisi.',
                'price.required'      => 'Harga modul wajib diisi.',
                'price.integer'       => 'Harga harus berupa angka.',
                'price.min'           => 'Harga tidak boleh negatif.',
                'status.required'     => 'Status modul wajib dipilih.',
                'status.in'           => 'Status harus bernilai "Locked" atau "Available".',
            ]
        );

        do {
            $randomStr = strtoupper(Str::random(3)); // 3 karakter acak
            $datePart = Carbon::now()->format('dmy'); // Tanggal saat ini
            $id_modul = 'MOD' . $randomStr . $datePart;
        } while (Modul::where('id_modul', $id_modul)->exists());
        

        // Inisialisasi objek modul
        $modul = new Modul();
        $modul->id_modul = $id_modul;
        $modul->nama_modul = $request->nama_modul;
        $modul->price = $request->price;
        $modul->status = $request->status;

        // Simpan video jika ada
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $path = 'uploads/modul';
            $modul->video = $file->store($path, 'public');
        }

        // Simpan ke database
        $modul->save();

        return redirect()->back()->with('success','Berhasil menambahkan Modul');
    }


    public function update(Request $request,$id)
    {
        $request->validate(
            [
                'nama_modul'  => 'required|string|max:255',
                'video'       => 'string',
                'price'       => 'required|integer|min:0',
                'status'      => 'required|in:Locked,Available', // sesuaikan dengan pilihan yang kamu gunakan
            ],
            [
                'id_modul.unique'     => 'ID modul sudah terdaftar.',
                'nama_modul.required' => 'Nama modul wajib diisi.',
                'video.required'      => 'Link atau embed video wajib diisi.',
                'price.required'      => 'Harga modul wajib diisi.',
                'price.integer'       => 'Harga harus berupa angka.',
                'price.min'           => 'Harga tidak boleh negatif.',
                'status.required'     => 'Status modul wajib dipilih.',
                'status.in'           => 'Status harus bernilai "Locked" atau "Available".',
            ]
        );

        // Inisialisasi objek modul
        $modul = Modul::find($id);
        $modul->nama_modul = $request->nama_modul;
        $modul->price = $request->price;
        $modul->status = $request->status;

        if ($request->hasFile('video')) {
            $file = $request->file('video');

            if ($modul->video) {
                Storage::disk('public')->delete($modul->video);
            }
            $path = 'uploads/modul';

            $modul->video = $file->store($path, 'public');
        }

        // Simpan ke database
        $modul->save();

        return redirect()->back()->with('success','Modul berhasil diperbarui');
    }

    public function delete($id)
    {
        $modul = Modul::find($id);
        if ($modul->video) {
            Storage::disk('public')->delete($modul->video);
        }
        $modul->delete();

        return redirect()->back()->with('success', 'Modul berhasil dihapus');
    }
}