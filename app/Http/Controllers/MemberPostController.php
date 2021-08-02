<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class MemberPostController extends Controller
{
    public function __construct()
    {
        $this->provinceModel = new Province();
        $this->vaksinModel = new Vaksin();
        $this->postModel = new Post();
    }
    public function index()
    {
        $data = [
            'title' => 'Postingan Ku',
            'posts' => $this->postModel->where(['user_id' => Auth::user()->id])->get()
        ];

        return view('pages.member.post-index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Buat Postingan',
            'provinces' => $this->provinceModel->all(),
            'vaksins' => $this->vaksinModel->all(),
        ];

        return view('pages.member.post-add', $data);
    }

    public function create(Request $request)
    {
        //check validasi form
        $request->validate([
            'nama_tempat' => 'required',
            'vaksin' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'alamat' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'link' => 'required',
            'keterangan' => 'required',
            'image' => 'required|image:jpg,png,jpeg|max:2048',
        ]);

        //set file image name 
        $fileName = '.' . time() . '_' . $request->image->getClientOriginalName();
        // simpan file image public/file_images/posts/
        if ($request->image->move(public_path('file_images/posts/'), $fileName)) {

            //set format Y-m-d
            $tgl_mulai = date('Y-m-d h:m:s', strtotime($request->tgl_mulai));
            $tgl_akhir = date('Y-m-d h:m:s', strtotime($request->tgl_mulai));

            //simpan post baru
            $post = new Post();
            $post->user_id = $request->user_id;
            $post->vaksin_id = $request->vaksin;
            $post->nama_tempat = $request->nama_tempat;
            $post->alamat = $request->alamat;
            $post->provinces_id = $request->province;
            $post->cities_id = $request->city;
            $post->districts_id = $request->district;
            $post->keterangan_tempat = $request->keterangan;
            $post->tgl_mulai = $tgl_mulai;
            $post->tgl_akhir = $tgl_akhir;
            $post->link_pendaftaran = $request->link;
            $post->image_post = $fileName;
            $post->status = 'active';
            $post->save();


            Toastr::success('Berhasil dipost :)', 'Success');
            return redirect()->route('member.post.add');
        } else {
            Toastr::error('Gagal menyimpan image hubungi admin :(', 'Error');
            return redirect()->route('member.post.add');
        }
    }
}
