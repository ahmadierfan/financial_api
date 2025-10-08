<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBMenusTable extends Migration
{
    public function up()
    {


        Schema::create('b_menus', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_menu');
            $table->foreignId('fk_system')->nullable()->constrained('b_systems', 'pk_system');
            $table->foreignId('fk_menu')->nullable()->constrained('b_menus', 'pk_menu');
            $table->foreignId('fk_modulemenu')->nullable()->constrained('b_menus', 'pk_menu');
            $table->foreignId('fk_apiget')->nullable()->constrained('b_apis', 'pk_api');
            $table->foreignId('fk_apicreate')->nullable()->constrained('b_apis', 'pk_api');
            $table->foreignId('fk_apiupdate')->nullable()->constrained('b_apis', 'pk_api');
            $table->foreignId('fk_apidestroy')->nullable()->constrained('b_apis', 'pk_api');
            $table->integer('menulevel')->nullable()->default(null);
            $table->string('menu', 255)->nullable()->default(null);
            $table->string('menusec', 250)->nullable()->default(null);
            $table->string('primarykey', 250)->nullable()->default(null);
            $table->string('customprob', 50)->nullable()->default(null);
            $table->string('component', 500)->nullable()->default(null);
            $table->string('secondcomponent', 100)->nullable()->default(null);
            $table->string('path', 255)->nullable()->default(null);
            $table->string('tagid', 255)->nullable()->default(null);
            $table->string('usetable', 255)->nullable()->default(null);
            $table->string('destination', 255)->nullable()->default(null);
            $table->string('icon', 255)->nullable()->default(null);
            $table->string('imgsrc', 255)->nullable()->default(null);
            $table->integer('ordernumber')->nullable()->default(null);
            $table->tinyInteger('isenable')->nullable()->default(1);
            $table->timestamps(0); // برای ایجاد `created_at` و `updated_at`
        });


    }

    public function down()
    {
        Schema::dropIfExists('b_menus');
    }
}
