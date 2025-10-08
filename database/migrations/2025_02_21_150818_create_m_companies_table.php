<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCompaniesTable extends Migration
{
    public function up()
    {


        Schema::create('m_companies', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_company');
            $table->foreignId('fk_regsitrar')->nullable()->constrained('users', 'id');
            $table->string('company', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci');
            $table->string('isenable', 255)->default('1')->charset('utf8mb4')->collation('utf8mb4_persian_ci');
            $table->timestamps(0);

            $table->index('fk_regsitrar');
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_companies');
    }
}
