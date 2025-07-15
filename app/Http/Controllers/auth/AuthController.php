<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registerOne()
    {
        return view('auth.register-one');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function actionRegister(Request $request)
    {
        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            // 'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => '3',
        ]);

        if ($user->role_id == '3') {
            $random4 = mt_rand(1000, 9999);
            $timestamp = Carbon::now()->format('YmdHis');
            Customer::create([
                'id_customer' => 'CUST' . $random4 . $timestamp,
                'user_id' => $user->id,
                'nama_lengkap' => $request->nama_lengkap,
            ]);
        }

        return redirect()->route('login')->withSuccess('Registrasi berhasil, silakan login.');
    }

    public function authenticate(Request $request)
    {
        // dd($request);
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Menyimpan input email ke dalam sesi
        Session::flash('email', $request->input('email'));

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email tidak terdaftar.'])->withInput();
        }
        
        // $credentials = $request->only('email', 'password');

        // // Mencoba otentikasi pengguna
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     $user = Auth::user();

        //     if ($user->role_id == '1') {
        //         return redirect()->route('admin.dashboard');
        //     }
        //     elseif ($user->role_id == '2') {
        //         return redirect()->route('bo.dashboard');
        //     }
        //     elseif ($user->role_id == '3') {
        //         return redirect()->route('c.dashboard');
        //     }
        // }

        if ($user && password_verify($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            if ($user->role_id == '1') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role_id == '2') {
                return redirect()->route('bo.dashboard');
            } elseif ($user->role_id == '3') {
                return redirect()->route('c.dashboard');
            }
        }

        

        return redirect()->back()->withErrors(['password' => 'Email atau Password salah.'])->withInput();
    }


    // ===================================================================================================================================================================================================
    // ===================================================================================================================================================================================================

    
    public function cekLogin($kode)
    {
        if (!Auth::check()) {
            return redirect()->route('login.customer', ['kode' => $kode])
                ->with('error', 'Anda harus login terlebih dahulu untuk Klaim Token.');
        } else {
            return redirect()->route('c.token.with.kode', ['kode' => $kode]);
        }
    }

    public function loginCustomer($kode)
    {
        return view('auth.login-customer', compact('kode'));
    }

    public function authenticateCustomer(Request $request, $kode)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect()->route('login.customer',['kode' => $kode])->withErrors($validator)->withInput();
        }
        // Menyimpan input email ke dalam sesi
        Session::flash('email', $request->input('email'));
        
        $credentials = $request->only('email', 'password');

        // Mencoba otentikasi pengguna
        if (Auth::attempt($credentials)) {

            if (Auth::user()->role_id != '3') {
                return redirect()->route('login.customer', ['kode' => $kode])
                    ->with('error', 'Anda harus login sebagai Customer untuk Klaim Token.');
            } else {
                return redirect()->route('c.token.with.kode', ['kode' => $kode]);
            }
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email tidak terdaftar.'])->withInput();
        }

        return redirect()->back()->withErrors(['password' => 'Email atau Password salah.'])->withInput();
    }

    public function registerCustomer($kode)
    {
        return view('auth.register-customer', compact('kode'));
    }

    public function actionRegisterCustomer(Request $request, $kode)
    {
        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            // 'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => '3',
        ]);

        if ($user->role_id == '3') {
            $random4 = mt_rand(1000, 9999);
            $timestamp = Carbon::now()->format('YmdHis');
            Customer::create([
                'id_customer' => 'CUST' . $random4 . $timestamp,
                'user_id' => $user->id,
                'nama_lengkap' => $request->nama_lengkap,
            ]);
        }

        return redirect()->route('login.customer', ['kode' => $kode])->withSuccess('Registrasi berhasil, silakan login.');
    }





    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('Anda berhasil logout');
    }
}