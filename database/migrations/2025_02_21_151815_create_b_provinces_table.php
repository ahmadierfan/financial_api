<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBProvincesTable extends Migration
{
    public function up()
    {
        Schema::create('b_provinces', function (Blueprint $table) {
            $table->bigIncrements('pk_province');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->string('province', 255)->nullable()->collation('utf8mb4_persian_ci');
            $table->integer('isenable')->default(1);
            $table->timestamps(0);
        });

    }

    public function down()
    {
        Schema::dropIfExists('b_provinces');
    }
}
