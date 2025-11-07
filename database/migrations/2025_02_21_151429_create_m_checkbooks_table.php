<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCheckbooksTable extends Migration
{
    public function up()
    {


        Schema::create('m_checkbooks', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_checkbook');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_financialrequesttype')->nullable()->constrained('b_financialrequeststypes','pk_financialrequesttype');
            $table->foreignId('fk_bank')->nullable()->constrained('b_banks', 'pk_bank');
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('description', 145)->nullable();
            $table->tinyInteger('isenable');
            $table->timestamps(0);
            $table->index('fk_registrar');
            $table->index('fk_bank');
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_checkbooks');
    }
}
