<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tittle_halaman
        $data = [
            'title' => 'Dashbord Admin'
        ];

        return view('pages.admin.index', $data);
    }

    //menuju ke page data vaksin
    public function vaksin()
    {
        //tittle_halaman
        $data = [
            'title' => 'Data Vaksin'
        ];

        return view('pages.admin.vaksin', $data);
    }

    //menuju ke page data posts
    public function posts()
    {
        //tittle_halaman
        $data = [
            'title' => 'Data Posts'
        ];

        return view('pages.admin.posts', $data);
    }
    public function users()
    {
        //tittle_halaman
        $data = [
            'title' => 'Data Member'
        ];

        return view('pages.admin.member', $data);
    }
}
