<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tanggal');
            $table->time('jam');
            $table->string('nama_tempat');
            $table->string('alamat');
            $table->enum('kendaraan', ['Angkutan Umum', 'Mobil', 'Motor', 'Sepeda', 'Pesawat', 'Kereta', 'Jalan Kaki']);
            $table->float('suhu_tubuh');
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
        Schema::dropIfExists('catatans');
    }
};
