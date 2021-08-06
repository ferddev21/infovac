<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->provinceModel = new Province();
        $this->cityModel = new City();
        $this->districtsModel = new District();
    }


    public function index()
    {
        $u = User::paginate(8);
        $data = [
            'title' => 'Data Posts',
            'users' => $u,
            'provinces' => $this->provinceModel->all(),
            'cities' => $this->cityModel->all(),
            'districts' => $this->districtsModel->all()
        ];

        return view('pages.admin.member', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'provinces' => $this->provinceModel->all(),
            'cities' => $this->cityModel->all(),
            'districts' => $this->districtsModel->all()

        ];

        return view('pages.admin.member-tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);
        $level = 'member';
        $nama = $request->nama;
        //encrypt password
        $password = $request->password;
        $hashedPassword = Hash::make($password);
        $user = User::create([
            'username' => $request->username,
            'password' => $hashedPassword,
            'email' => $request->email,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'provinces_id' => $request->province,
            'cities_id' => $request->city,
            // 'districts_id' => $request->district,
            'level' => $level,
            'status' => $request->status,
        ]);

        return redirect('/admin/user/')->with('status', 'Data member ' . $nama . ' berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $u = User::find($id);

        $data = [
            'title' => 'Data Vaksin',
            'user' => $u,
            'provinces' => $this->provinceModel->all(),
            'cities' => $this->cityModel->where(['province_id' => $u->provinces_id])->get(),
            'districts' => $this->districtsModel->where(['city_id' => $u->cities_id])->get()
        ];

        return view('pages.admin.member-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi form kosong
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);

        // mengecek isi form
        // dd($request->all());

        //mengambil data lama unuk dimasukkan apabila di form tidak ada
        $user = User::whereId($id)->first();
        $password = $user->password;
        $old_nama = $user->nama;

        //insert ke model database
        $user->update([
            'username' => $request->username,
            'password' => $password,
            'email' => $request->email,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'provinces_id' => $request->province,
            'cities_id' => $request->city,
            'districts_id' => $request->district,
            'status' => $request->status,
        ]);

        return redirect('/admin/user/')->with('status', 'Data member ' . $old_nama . ' berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::whereId($id)->delete();
        return redirect('/admin/user/')->with('status', 'Data User berhasil dihapus!');
    }
}
