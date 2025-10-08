<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMBankaccountsTable extends Migration
{
    public function up()
    {


        Schema::create('m_bankaccounts', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_bankaccount');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_bank')->constrained('b_banks', 'pk_bank');
            $table->foreignId('fk_accountingsub')->constrained('s_accountingsubs', 'pk_accountingsub');
            $table->string('bankaccount', 45)->charset('utf8mb4')->collation('utf8mb4_persian_ci')->nullable();
            $table->string('cardnumber', 45)->nullable();
            $table->string('accountnumber', 45)->nullable();
            $table->string('bankaccountowner', 45)->nullable();
            $table->string('iban', 45)->nullable();
            $table->unsignedInteger('isactive')->nullable();
            $table->unsignedInteger('isenable')->default(1);
            $table->timestamps(0);

            $table->index('fk_bank');
            $table->index('fk_accountingsub');
            $table->index('fk_registrar');
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_bankaccounts');
    }
}
