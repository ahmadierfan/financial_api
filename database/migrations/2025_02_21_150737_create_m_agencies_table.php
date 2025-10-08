<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagenciesTable extends Migration
{
    public function up()
    {


        Schema::create('m_agencies', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_agency');
            $table->foreignId('fk_registrar')->constrained('users', );
            $table->string('agency', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
            $table->index('fk_registrar');
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_agencies');
    }
}
