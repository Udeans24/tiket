<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->bigIncrements('id_pemesanan');
            $table->string('kode_pemesanan')->unique();
            $table->date('tanggal_pemesanan', ['dd::mm::yyyy']);
            $table->string('tempat_pemesanan');
            $table->bigInteger('id_penumpang')->unsigned();
            $table->foreign('id_penumpang')->references('id_penumpang')->on('penumpangs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode_kursi');
            $table->bigInteger('id_rute')->unsigned();
            $table->foreign('id_rute')->references('id_rute')->on('rute')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tujuan');
            $table->date('tanggal_berangkat',['dd::mm::yyyy']);
            $table->time('jam_cekin');
            $table->time('jam_berangkat');
            $table->string('total_bayar');
            $table->bigInteger('id_petugas')->unsigned();
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
