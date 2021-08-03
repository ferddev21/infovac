<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vaksin_id',
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

    // public function getDataPostsWithUsersById($id)
    // {
    //     return DB::table('posts')->select()->join('users', 'posts.user_id', '=', 'users.id')
    //         ->where('users_id', $id)->get();
    // }

    //Mengambil data dari foreignkey
    public function vaksin()
    {
        return $this->belongsTo(Vaksin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    public function citie()
    {
        return $this->belongsTo(City::class, 'cities_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'districts_id');
    }

    public function getSearch($field_id, $ids)
    {
        return $this->with(['vaksin', 'user'])->where(
            ['posts.status' => 'active', $field_id => $ids]
        );
    }
}
