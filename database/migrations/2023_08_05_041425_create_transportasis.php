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
        Schema::create('transportasi', function (Blueprint $table) {
            $table->bigIncrements('id_transportasi');
            $table->string('kode');
            $table->integer('jumlah_kursi');
            $table->string('keterangan');
            $table->bigInteger('id_type_transportasi')->unsigned();
            $table->foreign('id_type_transportasi')->references('id_type_transportasi')->on('type_transportasi')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportasi');
    }
};
