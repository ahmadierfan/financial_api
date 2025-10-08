<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMAccountingdocsTable extends Migration
{
    public function up()
    {


        Schema::create('m_accountingdocs', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_accountingdoc');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->date('accountingdocdate')->nullable();
            $table->integer('accountingdoccode');
            $table->string('description', 45)->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);

            $table->index('fk_registrar');
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_accountingdocs');
    }
}
