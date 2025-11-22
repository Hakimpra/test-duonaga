<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('kategori_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
        DB::table('produks')->insert([
            [
                'kategori_id' => 1,
                'deskripsi' => 'susu ultra 120ml',
                'nama' => 'ultra 120ml',
                'harga' => 12000,
                'gambar' => 'contoh.png',
            ],
            [
                'kategori_id' => 1,
                'deskripsi' => 'kapal api',
                'nama' => 'kapal api reteng',
                'harga' => 20000,
                'gambar' => 'contoh.png',
            ],
            [
                'kategori_id' => 2,
                'deskripsi' => 'piatos',
                'nama' => 'piatos 10gr',
                'harga' => 2000,
                'gambar' => 'contoh.png',
            ],
            [
                'kategori_id' => 2,
                'deskripsi' => 'kacang garuda',
                'nama' => 'kacang garuda pedas',
                'harga' => 6000,
                'gambar' => 'contoh.png',
            ],
            [
                'kategori_id' => 5,
                'deskripsi' => 'sabuncuci piring',
                'nama' => 'dmama lemon',
                'harga' => 9000,
                'gambar' => 'contoh.png',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
