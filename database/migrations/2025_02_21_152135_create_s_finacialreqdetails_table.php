<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSFinacialreqdetailsTable extends Migration
{
    public function up()
    {


        Schema::create('s_finacialreqdetails', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_finacialreqdetail');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_financialrequest')->constrained('m_financialrequests', 'pk_financialrequest');
            $table->foreignId('fk_cheque')->nullable()->constrained('s_checkbookdetails', 'pk_checkbookdetail');
            $table->bigInteger('amount');
            $table->date('duedate')->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
            $table->index('fk_financialrequest');
            $table->index('fk_cheque');
        });


    }

    public function down()
    {
        Schema::dropIfExists('s_finacialreqdetails');
    }
}
