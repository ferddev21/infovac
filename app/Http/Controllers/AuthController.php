<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

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
            'telphone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
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

        Toastr::success($request->nama . ' berhasil terdaftar', 'Success');
        return redirect()->route('login');
    }



    public function login(Request $request)
    {
        request()->validate(
            [
                'login' => 'required',
                'password' => 'required',
            ]
        );

        $login_type = filter_var($request->login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $request->merge([$login_type => $request->login]);

        $kredensil = $request->only($login_type, 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();

            if ($user->level === null) {
                Toastr::warning('Anda tidak memiliki akses', 'Warning');
                return redirect()->route('login');
            }

            if ($user->status !== 'active') {
                Auth::logout();
                Toastr::warning('Akses anda diblokir hubungin admin', 'Warning');
                return redirect()->route('login');
            }

            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            }

            return redirect()->route('member.post.index');
        }
        Toastr::warning('Pengguna tidak ditemukan, coba lagi', 'Warning');
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        Toastr::success('Anda berhasil Logout', 'Success');
        return redirect()->route('login');
    }
}
