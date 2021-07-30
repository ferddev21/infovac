<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vaksin_id')->constrained('vaksins')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_tempat', 128);
            $table->string('alamat', 128)->nullable();
            $table->char('provinces_id',2)->nullable();
            $table->char('cities_id',4)->nullable();
            $table->char('districts_id',7)->nullable();
            $table->text('keterangan_tempat');
            $table->datetime('tgl_mulai');
            $table->datetime('tgl_akhir');
            $table->string('link_pendaftaran', 128);
            $table->string('image_post', 128);
            $table->enum('status',['active','inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
