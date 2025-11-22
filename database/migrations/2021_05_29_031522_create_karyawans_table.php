<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('grade_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nip');
            $table->string('nama');
            $table->string('gander');
            $table->date('tgllahir');
            $table->date('tglmasuk');
            $table->timestamps();
        });
        DB::table('karyawans')->insert([
            [
                'grade_id' => 1,
                'nip' => '001',
                'nama' => 'budi doremi',
                'gander' => 'M',
                'tgllahir' => now(),
                'tglmasuk' => now(),
            ],
            [
                'grade_id' => 2,
                'nip' => '002',
                'nama' => 'agus',
                'gander' => 'M',
                'tgllahir' => now(),
                'tglmasuk' => now(),
            ],
            [
                'grade_id' => 4,
                'nip' => '003',
                'nama' => 'dwi',
                'gander' => 'F',
                'tgllahir' => now(),
                'tglmasuk' => now(),
            ],
            [
                'grade_id' => 2,
                'nip' => '004',
                'nama' => 'hari',
                'gander' => 'M',
                'tgllahir' => now(),
                'tglmasuk' => now(),
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
        Schema::dropIfExists('karyawans');
    }
}
