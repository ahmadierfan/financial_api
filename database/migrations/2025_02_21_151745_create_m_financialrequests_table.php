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
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0); // برای ایجاد `created_at` و `updated_at`
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_financialrequests');
    }
}
