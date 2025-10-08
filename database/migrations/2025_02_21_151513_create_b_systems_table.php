<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBSystemsTable extends Migration
{
    public function up()
    {


        Schema::create('b_systems', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_system');
            $table->string('system', 45)->charset('utf8mb4')->collation('utf8mb4_persian_ci');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });


    }

    public function down()
    {
        Schema::dropIfExists('b_systems');
    }
}
