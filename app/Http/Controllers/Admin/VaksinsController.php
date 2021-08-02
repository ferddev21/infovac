<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VaksinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data dari model vaksin
        $v = Vaksin::paginate(8);

        $data = [
            'title' => 'Data Vaksin',
            'vaksins' => $v
        ];

        return view('pages.admin.vaksin', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Data Vaksin'

        ];

        return view('pages.admin.vaksin-tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi form kosong
        $request->validate([
            'nama_vaksins' => 'required',
            'keterangan' => 'required',
        ]);

        //Memasukkan data ke model sesuai request
        $vaksins = Vaksin::create([
            'nama_vaksin' => $request->nama_vaksins,
            'keterangan' => $request->keterangan
        ]);
        //balik kehalaman form tambah dengan status
        return redirect('/admin/vaksin/')->with('status', 'Data vaksin, Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaksins  $vaksins
     * @return \Illuminate\Http\Response
     */
    public function show(Vaksin $vaksins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaksins  $vaksins
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengambil data dari model vaksin
        $v = Vaksin::find($id);

        $data = [
            'title' => 'Data Vaksin',
            'vaksins' => $v
        ];

        return view('pages.admin.vaksin-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaksins  $vaksins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi form kosong
        $request->validate([
            'nama_vaksin' => 'required',
            'keterangan' => 'required',
        ]);

        $vaksins = Vaksin::whereId($id)->first();


        $vaksins->update([
            'nama_vaksin' => $request->nama_vaksin,
            'keterangan' => $request->keterangan
        ]);
        $nama = $request->nama_vaksins;
        return redirect('/admin/vaksin/')->with('status', 'Data vaksin ' . $nama . ' berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaksins  $vaksins
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vaksin::whereId($id)->delete();
        return redirect('/admin/vaksin/')->with('status', 'Data vaksin berhasil dihapus!');
    }
}
