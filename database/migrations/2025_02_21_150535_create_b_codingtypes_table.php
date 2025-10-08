<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBCodingtypesTable extends Migration
{
    public function up()
    {
        Schema::create('b_codingtypes', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_codingtype');
            $table->string('codingtype')->charset('utf8mb4')
                ->collation('utf8mb4_persian_ci');
            $table->tinyInteger('isenable')->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('b_codingtypes');
    }
}
