<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBRolesTable extends Migration
{
    public function up()
    {


        Schema::create('b_roles', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_role');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->string('role', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);

            $table->index('fk_registrar');
        });


    }

    public function down()
    {
        Schema::dropIfExists('b_roles');
    }
}
