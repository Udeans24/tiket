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
        Schema::create('rute', function (Blueprint $table) {
            $table->bigIncrements('id_rute');
            $table->string('tujuan');
            $table->string('rute_awal');
            $table->string('rute_akhir');
            $table->time('jamberangkat');
            $table->string('harga');
            $table->bigInteger('id_transportasi')->unsigned();
            $table->foreign('id_transportasi')->references('id_transportasi')->on('transportasi')->onUpdate('cascade')->onDelete('cascade');     
            $table->timestamps();
           });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rute');
    }
};
