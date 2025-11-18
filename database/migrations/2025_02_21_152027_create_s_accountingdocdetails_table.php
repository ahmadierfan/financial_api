<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSAccountingDocDetailsTable extends Migration
{
    public function up()
    {


        Schema::create('s_accountingdocdetails', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_accountingdocdetail');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_accountingdoc')->constrained('m_accountingdocs', 'pk_accountingdoc');
            $table->foreignId('fk_coding')->nullable()->constrained('m_codings', 'pk_coding');
            $table->foreignId('fk_accountingsub')->nullable()->constrained('s_accountingsubs', 'pk_accountingsub');
            $table->bigInteger('debtor');
            $table->bigInteger('creditor');
            $table->string('description', 45)->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
            $table->index('fk_registrar');
            $table->index('fk_accountingdoc');
            $table->index('fk_accountingsub');
            $table->index('fk_coding');
        });


    }

    public function down()
    {
        Schema::dropIfExists('s_accountingdocdetails');
    }
}
