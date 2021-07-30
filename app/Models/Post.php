<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_tempat',
        'alamat',
        'provinces_id',
        'cities_id',
        'districts_id',
        'keterangan_tempat',
        'tgl_mulai',
        'tgl_akhir',
        'link_pendaftaran',
        'image_post',
        'status'
    ];


    public function getAllDataPostsWithUsers()
    {
        //join table post with table users
        return DB::table('posts')->select()->join('users', 'posts.user_id', '=', 'users.id')->get();
    }
}
