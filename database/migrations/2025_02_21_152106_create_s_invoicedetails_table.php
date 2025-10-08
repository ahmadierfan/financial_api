<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSInvoicedetailsTable extends Migration
{
    public function up()
    {


        Schema::create('s_invoicedetails', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_invoicedetail');
            $table->foreignId('fk_invoice')->constrained('m_invoices', 'pk_invoice');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_product')->constrained('m_products', 'pk_product');
            $table->foreignId('fk_unit')->nullable()->constrained('b_units', 'pk_unit');
            $table->unsignedBigInteger('feeprice');
            $table->unsignedInteger('count');
            $table->unsignedBigInteger('totalprice');
            $table->integer('discountpercent')->nullable();
            $table->bigInteger('discountamount')->nullable();
            $table->integer('taxpercent')->nullable();
            $table->bigInteger('taxamount')->nullable();
            $table->unsignedBigInteger('finalprice');
            $table->date('expiredate')->nullable();
            $table->unsignedInteger('isenable')->default(1);
            $table->timestamps(0);
            $table->index('fk_registrar');
            $table->index('fk_invoice');
            $table->index('fk_product');
            $table->index('fk_unit');
        });


    }

    public function down()
    {
        Schema::dropIfExists('s_invoicedetails');
    }
}
