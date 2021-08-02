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
}
