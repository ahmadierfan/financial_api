<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRUsersRolesTable extends Migration
{
    public function up()
    {


        Schema::create('r_usersroles', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_userrole');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_user')->constrained('users', 'id');
            $table->foreignId('fk_role')->constrained('b_roles', 'pk_role');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
            $table->index('fk_user');
            $table->index('fk_role');
            $table->index('fk_registrar');
        });


    }

    public function down()
    {
        Schema::dropIfExists('r_usersroles');
    }
}
