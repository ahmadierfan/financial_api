<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {


        Schema::create('b_financialrequeststypes', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_financialrequesttype');
            $table->string('financialrequesttype');
            $table->string('financialrequesttypesec');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0); 
        });


    }

    public function down()
    {
        Schema::dropIfExists('b_financialrequeststypes');
    }
};
