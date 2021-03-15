<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePengaduannRahmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduann_rahmas', function (Blueprint $table) {
            $table->increments('id_pengaduan');
            $table->string('tgl_pengaduan');
            $table->string('nik');
            $table->text('isi_laporan');
            $table->string('foto');
            $table->enum('status',['0','proses','selesai']);
            $table->timestamps();
            $table->foreign('nik')->references('nik')->on('masyarakatt_rahmas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduann_rahmas');
    }
}
