<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialMediaAuthController extends Controller
{
    //Google Auth config
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGooleCallback()
    {
        try {
            $userGoogle = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $userGoogle->id)->first();

            if ($findUser) {

                Auth::loginUsingId($findUser->id);
                if ($findUser->status == 'admin') {
                    return redirect()->route('admin.index');
                }

                Toastr::success($userGoogle['name'] . ', anda berhasil masuk', 'Selamat Datang Kembali');
                return redirect()->route('member.post.index');
            }

            $username = smartUsername($userGoogle['given_name']);

            $newUser = User::create([
                'username' => $username,
                'password' => bcrypt($userGoogle->id),
                'email' => $userGoogle['email'],
                'google_id' => $userGoogle->id,
                'nama' => $userGoogle['name'],
                'tep' => '',
                'level' => 'member',
                'status' => 'active',
            ]);
            if ($newUser) {
                Auth::loginUsingId($newUser->id);

                Toastr::success($userGoogle['name'] . ' berhasil terdaftar, segera update username dan password akun anda', 'Selamat Datang');
                return redirect()->route('member.post.index');
            }
        } catch (\Exception $e) {

            if ($e->getCode() == null) {
                return redirect()->route('home');
            }
            return abort($e->getCode(), $e->getMessage());
        }
    }
}
