<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravolt\Indonesia\Models\City;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->userModel = new User();
        $this->provinceModel = new Province();
        $this->cityModel = new City();
        $this->districtsModel = new District();
    }

    public function index()
    {
        $user = $this->userModel->where(['id' => Auth::user()->id])->first();
        $data = [
            'title' => 'Member',
            'user' => $user,
            'provinces' => $this->provinceModel->all(),
            'cities' => $this->cityModel->where(['province_id' => $user->provinces_id])->get(),
            'districts' => $this->districtsModel->where(['city_id' => $user->cities_id])->get()
        ];

        return view('pages.member.akun-index', $data);
    }

    public function update(Request $request)
    {

        $request->validate([
            'username'
            => ['required', 'max:32', 'min:3', 'alpha_dash', Rule::unique('users', 'username')->ignore($request->id)],
            'nama' => 'required|max:32|min:3',
            'email' => ['required', Rule::unique('users', 'email')->ignore($request->id)],
            'telphone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $userData = User::find($request->id);


        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'telp' => $request->telphone,
            'provinces_id' => $request->province,
            'cities_id' => $request->city,
            'districts_id' => $request->district,
            'alamat' => $request->alamat
        ];


        if ($userData->update($data)) {
            Toastr::success('Profile berhasil diupdate :)', 'Success');
            return redirect()->route('member.account');
        }

        Toastr::error('Profile gagal diupdate :(', 'Gagal');
        return redirect()->route('member.account');
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:3',
        ]);

        $userData = User::find($request->id);
        //check password yang di inputkan user sama dengan passsword didatabase ?
        if (!Hash::check($request->password_lama, $userData->password)) { // jika salah 
            Toastr::warning('Password salah :(', 'Gagal');
            return redirect()->route('member.account');
        }

        //set data password baru update dalam array
        $data = [
            'password' => bcrypt($request->password_baru),
        ];


        if ($userData->update($data)) {
            Toastr::success('Password berhasil diupdate :)', 'Success');
            return redirect()->route('member.account');
        }

        Toastr::error('Password gagal diupdate :(', 'Gagal');
        return redirect()->route('member.account');
    }
}
