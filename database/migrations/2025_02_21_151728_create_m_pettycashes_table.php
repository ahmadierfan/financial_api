<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMPettycashesTable extends Migration
{
    public function up()
    {


        Schema::create('m_pettycashes', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_pettycach');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->foreignId('fk_accountingsub')->constrained('s_accountingsubs', 'pk_accountingsub');
            $table->string('pettycach', 255);
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0); // برای ایجاد `created_at` و `updated_at`
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_pettycashes');
    }
}
