<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMInvoicesTable extends Migration
{
    public function up()
    {


        Schema::create('m_invoices', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_invoice');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->foreignId('fk_user')->constrained('users');
            $table->foreignId('fk_warehouse')->nullable()->constrained('m_warehouses', 'pk_warehouse');
            $table->foreignId('fk_agency')->nullable()->constrained('m_agencies', 'pk_agency');
            $table->foreignId('fk_useraddress')->nullable()->constrained('s_useraddresses', 'pk_useraddress');
            $table->foreignId('fk_invoicetype')->constrained('b_invoicetypes', 'pk_invoicetype');
            $table->string('invoicetitle', 145)->nullable();
            $table->string('invoicecode', 45)->nullable();
            $table->date('invoicedocdate');
            $table->date('duedate')->nullable();
            $table->integer('shipping')->nullable();
            $table->string('attachments', 245)->nullable();
            $table->string('description', 225)->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_invoices');
    }
}
