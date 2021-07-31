<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    private function checkAuth()
    {
        if (!Auth::check()) {
            return false;
        }
        return true;
    }

    public function index()
    {
        if ($this->checkAuth()) {
            return redirect()->route('home');
        }
        $data = [
            'title' => 'Login'
        ];
        return view('pages.login', $data);
    }

    public function register()
    {
        if ($this->checkAuth()) {
            return redirect()->route('home');
        }
        $data = [
            'title' => 'Register'
        ];

        return view('pages.register', $data);
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'username' => 'required|max:32|min:6|alpha_dash|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'telphone' => 'required|max:15|min:9',
            'password' => 'required|max:32|min:4',
            'nama' => 'required|max:32|min:4',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->nama = $request->nama;
        $user->telp = $request->telphone;
        $user->level = 'member';
        $user->password = bcrypt($request->password);
        $user->status = 'active';
        $user->save();

        $request->session()->flash('success', $request->username . ' berhasil dibuat');
        return redirect()->route('login')->with('success', 'Berhasil membuat akun silahkan login');
    }



    public function login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('email', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();

            if ($user->level === null) {
                return redirect()->route('login')->with('error', 'anda tidak memiliki akses');
            }

            if ($user->status !== 'active') {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Akses anda diblokir');
            }

            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            }

            return redirect()->intended('member');
        }

        return redirect()->route('login')->with('error', 'Pengguna tidak ditemukan');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil Logout');
    }
}
