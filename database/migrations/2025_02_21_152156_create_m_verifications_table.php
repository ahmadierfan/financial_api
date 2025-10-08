<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMVerificationsTable extends Migration
{
    public function up()
    {


        Schema::create('m_verifications', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_verification');
            $table->integer('verificationcode');
            $table->string('mobile', 25)->nullable();
            $table->string('email', 145)->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_verifications');
    }
}
