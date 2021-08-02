<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vaksin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menghitung jumlah data dari tabel
        $jumlah_posts = Post::count();
        $jumlah_vaksin = Vaksin::count();
        $jumlah_user = User::count();
        $data = [
            'jumlah_posts' => $jumlah_posts,
            'jumlah_vaksins' => $jumlah_vaksin,
            'jumlah_user' => $jumlah_user,
            'title' => 'Dashbord Admin'
        ];

        return view('pages.admin.index', $data);
    }

    public function edit($id)
    {
        $u = User::find($id);



        $data = [
            'title' => 'Setting Admin',
            'user' => $u
        ];

        return view('pages.admin.setting', $data);
    }

    public function update(Request $request, $id)
    {
        //validasi form kosong
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);

        // mengecek isi form
        // dd($request->all());

        //mengambil data lama unuk dimasukkan apabila di form tidak ada
        $user = User::whereId($id)->first();

        $status = 'active';
        //insert ke model database
        $user->update([
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'status' => $status,
        ]);

        return redirect('/admin/setting/1')->with('status', 'Data Admin berhasil diedit!');
    }
}
