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
        Schema::create('product_manufactures', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama');
            $table->string('kategori');            
            $table->text('deskripsi');

            $table->text('dekripsiTambahan')->nullable();
            $table->integer('berat')->nullable();
            $table->string('ukuran')->nullable();

            $table->string('fotoTambahan1')->nullable();
            $table->string('fotoTambahan2')->nullable();
            $table->string('fotoTambahan3')->nullable();
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
        Schema::dropIfExists('product_manufactures');
    }
};
