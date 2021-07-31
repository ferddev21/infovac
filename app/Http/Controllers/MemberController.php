<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MemberController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Member'
        ];
        return view('pages.member.index', $data);
    }
}
