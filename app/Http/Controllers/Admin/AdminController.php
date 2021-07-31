<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
