<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBProductcategoriesTable extends Migration
{
    public function up()
    {


        Schema::create('b_productcategories', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_productcategory');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_productcategory')->nullable()->default(null)->constrained('b_productcategories', 'pk_productcategory');
            $table->string('productcategory', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci')->nullable()->default(null);
            $table->string('productcategorysec', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci')->nullable()->default(null);
            $table->string('descriptions', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci')->nullable()->default(null);
            $table->string('imagepath', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci')->nullable()->default(null);
            $table->string('isenable', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci')->nullable()->default(null);
            $table->timestamps(0);

            $table->index('fk_registrar');
        });


    }

    public function down()
    {
        Schema::dropIfExists('b_productcategories');
    }
}
