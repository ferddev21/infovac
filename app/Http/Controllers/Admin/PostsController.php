<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $p = Post::paginate(8);

        $data = [
            'title' => 'Data Posts',
            'posts' => $p
        ];

        return view('pages.admin.posts', $data);
    }

    public function detail($id)
    {
        $p = Post::find($id);
        $v = Vaksin::all();
        $data = [
            'title' => 'Data Posts',
            'posts' => $p,
            'vaksins' => $v
        ];

        return view('pages.admin.detail-posts', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Post $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        // mengecek isi form
        // dd($request->all());

        //mengambil data lama unuk dimasukkan apabila di form tidak ada
        $post = Post::whereId($id)->first();
        $old_nama = $post->nama_tempat;
        //insert ke model database
        $post->update([

            'status' => $request->status,
        ]);

        return redirect('/admin/posts/')->with('status', 'Data Posts ' . $old_nama . ' berhasil diubah statusnya!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::whereId($id)->delete();
        return redirect('/admin/posts/')->with('status', 'Data Posts berhasil dihapus!');
    }
}
