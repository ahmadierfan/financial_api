<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('b_cities', function (Blueprint $table) {
            $table->bigIncrements('pk_city');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->foreignId('fk_province')->constrained('b_provinces', 'pk_province');
            $table->string('city', 100)->collation('utf8mb4_persian_ci');
            $table->integer('isenable')->default(1);
            $table->timestamps(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('b_cities');
    }
}
