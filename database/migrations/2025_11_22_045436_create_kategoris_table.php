<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('nama');
            $table->timestamps();
        });
        
        DB::table('kategoris')->insert([
            [
                'kategori' => 'A',
                'nama' => 'Minuman',
            ],
            [
                'kategori' => 'B',
                'nama' => 'makanan ringan',
            ],
            [
                'kategori' => 'C',
                'nama' => 'perabot',
            ],
            [
                'kategori' => 'D',
                'nama' => 'alat tulis',
            ],
            [
                'kategori' => 'E',
                'nama' => 'pembersih',
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
        Schema::dropIfExists('kategoris');
    }
}
