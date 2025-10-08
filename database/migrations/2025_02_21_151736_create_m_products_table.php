<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMProductsTable extends Migration
{
    public function up()
    {
        Schema::create('m_products', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_product');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->foreignId('fk_unit')->nullable()->constrained('b_units', 'pk_unit');
            $table->foreignId('fk_secunit')->nullable()->constrained('b_units', 'pk_unit');
            $table->foreignId('fk_taxtype')->nullable();
            $table->foreignId('fk_productcategory')->nullable()->constrained('b_productcategories', 'pk_productcategory');
            $table->foreignId('fk_accountingsub')->nullable()->constrained('s_accountingsubs', 'pk_accountingsub');
            $table->string('product');
            $table->string('productsec')->nullable();
            $table->string('imagepath')->nullable();
            $table->string('productcode')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('conversionfactor')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->decimal('height', 10, 2)->nullable();
            $table->double('width')->nullable();
            $table->string('color')->nullable();
            $table->integer('tax')->nullable();
            $table->string('descriptions')->nullable();
            $table->string('property')->nullable();
            $table->string('keywords')->nullable();
            $table->decimal('saleprice', 10, 2)->nullable();
            $table->decimal('buyprice', 10, 2)->nullable();
            $table->integer('iscommingsoon')->nullable();
            $table->integer('isavailable')->nullable();
            $table->integer('isforonlinesale')->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_products');
    }
}
