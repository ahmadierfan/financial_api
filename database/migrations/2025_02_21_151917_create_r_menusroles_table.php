<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRMenusRolesTable extends Migration
{
    public function up()
    {


        Schema::create('r_menusroles', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_menurole');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->foreignId('fk_menu')->constrained('b_menus', 'pk_menu');
            $table->foreignId('fk_role')->constrained('b_roles', 'pk_role');
            $table->integer('editaccess')->nullable();
            $table->integer('deleteaccess')->nullable();
            $table->integer('printaccess')->nullable();
            $table->boolean('isenable')->default(true);
            $table->timestamps(0);
            $table->index('fk_menu');
            $table->index('fk_role');
        });


    }

    public function down()
    {
        Schema::dropIfExists('r_menusroles');
    }
}
