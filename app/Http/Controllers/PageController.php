<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\Province;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'Info Vaksinasi',
            'imageCover' => 'https://images.pexels.com/photos/5863389/pexels-photo-5863389.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
            'province' => Province::all(),
            'posts' => Post::all()
        ];

        return view('pages.home', $data);
    }

    public function postView($id)
    {
        $id = hashids($id, 'decode');
        $Post = Post::whereId($id[0])->first();

        $data = [
            'title' => $Post->nama_tempat,
            'post' => $Post
        ];

        return view('pages.post-view', $data);
    }
}
