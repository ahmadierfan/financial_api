<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRUsercompaniesTable extends Migration
{
    public function up()
    {


        Schema::create('r_usercompanies', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_usercompany');
            $table->foreignId('fk_company')->constrained('m_companies', 'pk_company');
            $table->foreignId('fk_user')->constrained('users');
            $table->tinyInteger('isenable')->default(1);
            $table->dateTime('crated_at');
            $table->string('updated_at', 45);
            $table->index('fk_user');
            $table->index('fk_company');
        });


    }

    public function down()
    {
        Schema::dropIfExists('r_usercompanies');
    }
}
