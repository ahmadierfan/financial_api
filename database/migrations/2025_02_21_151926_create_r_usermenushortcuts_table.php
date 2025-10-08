<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRUserMenuShortcutsTable extends Migration
{
    public function up()
    {


        Schema::create('r_usermenushortcuts', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_menushortcut');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_user')->constrained('users', 'id');
            $table->foreignId('fk_menu')->constrained('b_menus', 'pk_menu');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
            $table->index('fk_menu');
            $table->index('fk_registrar');
            $table->index('fk_user');
        });


    }

    public function down()
    {
        Schema::dropIfExists('r_usermenushortcuts');
    }
}
