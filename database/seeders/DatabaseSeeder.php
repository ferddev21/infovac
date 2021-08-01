<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt("1234"),
            'email' => 'admin@mail.com',
            'nama' => 'Admin',
            'alamat' => 'Sleman CondongCatur',
            'telp' => '0895396784047',
            'level' => 'admin',
            'status' => 'active',
        ]);
        DB::table('vaksins')->insert([
            'nama_vaksin' => 'Sinovac',
            'keterangan' => 'virus Corona (SARS-CoV-2) yang telah dimatikan (inactivated virus)',
        ]);
        DB::table('posts')->insert([
            'user_id' => '1',
            'vaksin_id' => '1',
            'nama_tempat' => 'JEC',
            'alamat' => 'l. Raya Janti Jl. Wonocatur, Wonocatur, Banguntapan, Kec. Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55198',
            'keterangan_tempat' => 'Bertempat di Gedung JEC',
            'tgl_mulai' => new DateTime,
            'tgl_akhir' => new DateTime,
            'link_pendaftaran' => 'bit.ly/daftar/',
            'image_post' => 'Jec.jpeg',
            'status' => 'active',
        ]);
    }
}
