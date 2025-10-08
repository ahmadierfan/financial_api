<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBWarehousedoctypesTable extends Migration
{
    public function up()
    {


        Schema::create('b_warehousedoctypes', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_warehousedoctype');
            $table->string('warehousedoctype', 115);
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });


    }

    public function down()
    {
        Schema::dropIfExists('b_warehousedoctypes');
    }
}
