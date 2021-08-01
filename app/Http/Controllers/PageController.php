<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravolt\Indonesia\Models\Province;

class PageController extends Controller
{
    public function home()
    {
        $province = new Province();
        $data = [
            'title' => 'Info Vaksinasi',
            'imageCover' => 'https://images.pexels.com/photos/5863389/pexels-photo-5863389.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
            'province' => $province->all()
        ];

        return view('pages.home', $data);
    }

    public function detailPost()
    {
        $data = [
            'title' => 'Vaksinasi Lansia'

        ];

        return view('pages.detail-post', $data);
    }
}
