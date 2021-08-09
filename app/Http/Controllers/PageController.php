<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\Province;
use Illuminate\Support\Facades\Redirect;
use Mockery\Undefined;

class PageController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'Info Vaksinasi',
            'imageCover' => 'https://images.pexels.com/photos/5863389/pexels-photo-5863389.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
            'province' => Province::all(),
            'posts' => Post::with(['vaksin', 'user'])->where('status', 'active')->orderBy('id', 'desc')->get()
        ];

        return view('pages.home', $data);
    }

    public function postView($id)
    {
        $id = hashids($id, 'decode');
        $Post = Post::with(['vaksin', 'user'])->whereId($id[0])->first();

        $data = [
            'title' => $Post->nama_tempat,
            'post' => $Post
        ];

        return view('pages.post-view', $data);
    }

    public function search(Request $request)
    {
        $this->post = new Post();

        $data = [
            'title' => 'Info Vaksinasi',
            'province' => Province::all(),
        ];

        $view = 'pages.search';

        if ($request->district != null) {
            $data['posts'] = $this->post->getSearch('districts_id', $request->district)->orderBy('id', 'desc')->get();
            return view($view, $data);
        }

        if ($request->city != null) {
            $data['posts'] = $this->post->getSearch('cities_id', $request->city)->orderBy('id', 'desc')->get();
            return view($view, $data);
        }

        if ($request->prov != null) {
            $data['posts'] = $this->post->getSearch('provinces_id', $request->prov)->orderBy('id', 'desc')->get();
            return view($view, $data);
        }

        if ($request->prov == null) {
            $data['posts'] = Post::with(['vaksin', 'user'])->where('status', 'active')->orderBy('id', 'desc')->get();
            return view($view, $data);
        }
    }
}
