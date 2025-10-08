<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBInvoicetypesTable extends Migration
{
    public function up()
    {


        Schema::create('b_invoicetypes', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_invoicetype');
            $table->string('invoicetype', 45)->nullable();
            $table->tinyInteger('isenable')->nullable();
            $table->timestamps(0); // برای ایجاد `created_at` و `updated_at`
        });


    }

    public function down()
    {
        Schema::dropIfExists('b_invoicetypes');
    }
}
