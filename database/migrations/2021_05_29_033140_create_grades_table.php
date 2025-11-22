<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('grade');
            $table->integer('gaji');
            $table->timestamps();
        });
        
        DB::table('grades')->insert([
            [
                'grade' => 'A',
                'gaji' => 1000000,
            ],
            [
                'grade' => 'B',
                'gaji' => 2000000,
            ],
            [
                'grade' => 'C',
                'gaji' => 3000000,
            ],
            [
                'grade' => 'D',
                'gaji' => 4000000,
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
        Schema::dropIfExists('grades');
    }
}
