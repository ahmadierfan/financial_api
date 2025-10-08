<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSMenucolumnsTable extends Migration
{
    public function up()
    {


        Schema::create('s_menucolumns', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_menucolumn');
            $table->foreignId('fk_menu')->constrained('b_menus', 'pk_menu');
            $table->string('field', 500)->charset('latin1');
            $table->string('label', 500)->charset('utf8mb4')->collation('utf8mb4_persian_ci');
            $table->string('labelsec', 250)->charset('latin1');
            $table->integer('width')->nullable();
            $table->integer('ordernumber');
            $table->integer('isnumeric')->nullable();
            $table->integer('isprice')->nullable();
            $table->integer('ishtml')->nullable();
            $table->integer('isimage')->nullable();
            $table->integer('isshowinmobile')->default(1);
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
            $table->index('fk_menu');
        });


    }

    public function down()
    {
        Schema::dropIfExists('s_menucolumns');
    }
}
