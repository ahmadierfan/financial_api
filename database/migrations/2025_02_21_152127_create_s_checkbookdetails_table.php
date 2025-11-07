<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSCheckbookdetailsTable extends Migration
{
    public function up()
    {


        Schema::create('s_checkbookdetails', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_checkbookdetail');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_checkbook')->constrained('m_checkbooks', 'pk_checkbook');
            $table->string('checknumber', 45)->nullable();
            $table->string('sayadnumber', 45)->nullable();
            $table->date('duedate')->nullable();
            $table->bigInteger('price');
            $table->tinyInteger('isenable')->default(1);

            $table->timestamps(0);
            $table->index('fk_checkbook');
        });


    }

    public function down()
    {
        Schema::dropIfExists('s_checkbookdetails');
    }
}
