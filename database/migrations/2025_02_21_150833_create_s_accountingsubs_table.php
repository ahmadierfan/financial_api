<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSAccountingsubsTable extends Migration
{
    public function up()
    {


        Schema::create('s_accountingsubs', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_accountingsub');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_accountingsubgreoup')->constrained('b_accountingsubgroups', 'pk_accountingsubgroup');
            $table->string('accountingsub', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci');
            $table->integer('accountingsubcode');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);

            $table->index('fk_registrar', 'fk_s_accountingsubs_users1_idx');
        });


    }

    public function down()
    {
        Schema::dropIfExists('s_accountingsubs');
    }
}
