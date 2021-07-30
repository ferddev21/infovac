<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vaksin;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->vaksinModel = new Vaksin();
        $this->postModel = new Post();
    }

    //menuju ke page dashboard admin
    public function dashboard()
    {

        $data = [
            'title' => 'Dashbord Admin'
        ];

        return view('pages.admin.index', $data);
    }

    //menuju ke page data vaksin admin
    public function vaksin()
    {

        $data = [
            'title' => 'Data Vaksin',
            'dataVaksin' => $this->vaksinModel->all()
        ];

        return view('pages.admin.vaksin', $data);
    }

    //menuju ke page data posts admin
    public function posts()
    {

        $data = [
            'title' => 'Data Posts',
            'dataPost' => $this->postModel->getAllDataPostsWithUsers()
        ];

        return view('pages.admin.posts', $data);
    }

    //menuju ke page data posts users
    public function users()
    {

        $data = [
            'title' => 'Data Member'
        ];

        return view('pages.admin.member', $data);
    }
}
