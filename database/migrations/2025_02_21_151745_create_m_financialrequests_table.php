<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMFinancialRequestsTable extends Migration
{
    public function up()
    {


        Schema::create('m_financialrequests', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_financialrequest');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->foreignId('fk_financialrequesttype')->nullable()->constrained('b_financialrequeststypes','pk_financialrequesttype');
            $table->foreignId('fk_invoice')->nullable()->constrained('m_invoices', 'pk_invoice');
            $table->foreignId('fk_payerorreceiver')->nullable()->constrained('users');
            $table->date('financialrequestdate');
            $table->bigInteger('price')->nullable();
            $table->string('title')->nullable();
            $table->string('description', 145)->nullable();
            $table->string('attachments', 145)->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0); 
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_financialrequests');
    }
}
