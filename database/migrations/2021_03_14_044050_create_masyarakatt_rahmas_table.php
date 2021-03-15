<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasyarakattRahmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masyarakatt_rahmas', function (Blueprint $table) {
            $table->string('nik')->primary();
            $table->string('nama');
            $table->string('username');
            $table->string('password');
            $table->string('telp');
            $table->UnsignedInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masyarakatt_rahmas');
    }
}
