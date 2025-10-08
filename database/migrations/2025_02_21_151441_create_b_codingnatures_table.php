<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBCodingnaturesTable extends Migration
{
    public function up()
    {


        Schema::create('b_codingnatures', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_codingnature');
            $table->string('codingnature', 145)->charset('utf8mb4')->collation('utf8mb4_persian_ci')->nullable();
            $table->tinyInteger('isenable')->nullable()->default(1);
            $table->timestamps(0);

        });


    }

    public function down()
    {
        Schema::dropIfExists('b_codingnatures');
    }
}
