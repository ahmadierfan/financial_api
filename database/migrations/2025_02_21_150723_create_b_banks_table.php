<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBBanksTable extends Migration
{
    public function up()
    {


        Schema::create('b_banks', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_bank');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->string('bank', 255)->nullable()->collation('utf8mb4_persian_ci');
            $table->string('bankicon', 255)->nullable()->collation('utf8mb4_persian_ci');
            $table->tinyInteger('isenable')
                ->default(1);
            $table->timestamps(0);
        });



    }

    public function down()
    {
        // حذف جدول
        Schema::dropIfExists('b_banks');
    }
}
