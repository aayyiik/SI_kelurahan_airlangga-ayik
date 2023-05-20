<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->bigIncrements('id_kegiatan');
            $table->unsignedBigInteger('no_admin');
            $table->foreign('no_admin')->references('nik_nip')->on('users');
            $table->string('nama_kegiatan');
            $table->string('penyelenggara')->nullable();
            $table->string('jenis_peserta');
            $table->integer('kategori');
            $table->dateTime('tanggal');
            $table->string('tempat')->nullable();
            $table->text('deskripsi',1000)->nullable();;
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
        Schema::dropIfExists('kegiatan');
    }
}
