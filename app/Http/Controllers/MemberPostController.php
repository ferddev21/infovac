<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MemberPostController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Postingan Ku'
        ];

        return view('pages.member.post-index', $data);
    }
}
