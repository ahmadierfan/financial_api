<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCodingsTable extends Migration
{
    public function up()
    {


        Schema::create('m_codings', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_coding');
            $table->foreignId('fk_registrar')->constrained(table: 'users');
            $table->foreignId('fk_accountingsubgroup')->constrained('b_accountingsubgroups', 'pk_accountingsubgroup');
            $table->foreignId('fk_accounttype')->nullable()->constrained('b_codingtypes', 'pk_codingtype');
            $table->foreignId('fk_coding')->nullable()->constrained('m_codings', 'pk_coding');
            $table->foreignId('fk_codingnature')->constrained('b_codingnatures', 'pk_codingnature');
            $table->string('coding', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci');
            $table->integer('codingcode');
            $table->integer('isactive')->default(1);
            $table->integer('isforcesub')->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_codings');
    }
}
