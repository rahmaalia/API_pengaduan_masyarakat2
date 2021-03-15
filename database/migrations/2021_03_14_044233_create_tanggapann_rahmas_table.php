<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapannRahmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapann_rahmas', function (Blueprint $table) {
            $table->increments('id_tanggapan');
            $table->UnsignedInteger('id_pengaduan');
            $table->string('tgl_tanggapan');
            $table->text('tanggapan');
            $table->UnsignedInteger('id_petugas');
            $table->timestamps();
            $table->foreign('id_pengaduan')->references('id_pengaduan')->on('pengaduann_rahmas')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugass_rahmas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggapann_rahmas');
    }
}
