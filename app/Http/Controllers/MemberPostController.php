<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Hashids\Hashids;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

class MemberPostController extends Controller
{
    public function __construct()
    {
        $this->provinceModel = new Province();
        $this->cityModel = new City();
        $this->districtsModel = new District();
        $this->vaksinModel = new Vaksin();
        $this->postModel = new Post();

        $this->url_image = 'file_images/posts/';
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

        //set nama file image baru
        $fileName = '.' . time() . '_' . md5($request->nama_tempat) .  '.' . $request->image->extension();

        // simpan file image public/file_images/posts/
        if ($request->image->move(public_path($this->url_image), $fileName)) {

            //set format Y-m-d
            $tgl_mulai = date('Y-m-d h:m:s', strtotime($request->tgl_mulai));
            $tgl_akhir = date('Y-m-d h:m:s', strtotime($request->tgl_selesai));

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

    public function edit($id)
    {
        $id = hashids($id, 'decode');
        $Post = Post::whereId($id[0])->first();

        $data = [
            'title' => 'Edit Post | ' . $Post->nama_tempat,
            'post' => $Post,
            'vaksins' => $this->vaksinModel->all(),
            'provinces' => $this->provinceModel->all(),
            'cities' => $this->cityModel->where(['province_id' => $Post->provinces_id])->get(),
            'districts' => $this->districtsModel->where(['city_id' => $Post->cities_id])->get()
        ];

        return view('pages.member.post-edit', $data);
    }


    public function update(Request $request)
    {

        $Post = Post::whereId($request->id)->first();
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
            'image' => 'image:jpg,png,jpeg|max:2048',
        ]);


        //check apakah file image profile di input 
        if ($request->image) {

            //set nama file image baru
            $fileName = '.' . time() . '_' . md5($request->nama_tempat) .  '.' . $request->image->extension();

            if ($request->image->move(public_path($this->url_image), $fileName)) {
                //check apakah file image sebelumnya tidak kosong
                if ($Post->image_post !== null) {
                    //delete file image sebelumnya
                    unlink(public_path($this->url_image) . $Post->image_post);
                }
            }
        } else {
            //set nama file image tetap nama yang lama
            $fileName = $Post->image_post;
        }


        //set format Y-m-d
        $tgl_mulai = date('Y-m-d h:m:s', strtotime($request->tgl_mulai));
        $tgl_akhir = date('Y-m-d h:m:s', strtotime($request->tgl_selesai));

        // set status
        $status = ($request->status) ? 'active' : 'inactive';

        //update post
        if ($Post->update([
            'vaksin_id' => $request->vaksin,
            'nama_tempat' => $request->nama_tempat,
            'alamat' => $request->alamat,
            'provinces_id' => $request->province,
            'cities_id' => $request->city,
            'districts_id' => $request->district,
            'keterangan_tempat' => $request->keterangan,
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
            'link_pendaftaran' => $request->link,
            'image_post' => $fileName,
            'status' => $status,
        ])) {
            Toastr::success('Update Berhasil :)', 'Success');
            return redirect()->route('member.post.edit', ['id' => hashids($request->id, 'encode')]);
        }
        Toastr::error('Update Gagal :(', 'Error');
        return redirect()->route('member.post.edit', ['id' => hashids($request->id, 'encode')]);
    }
    public function delete(Request $request)
    {
        $post = $this->postModel->find($request->id);

        //check apakah image_post tidak null, jika tidak null delete file image
        if (!empty($post->image_post)) {
            unlink(public_path($this->url_image) . $post->image_post);
        }

        if ($post->delete()) {
            return response()->json('', 200);
        }
        return response()->json('', 500);
    }
}
