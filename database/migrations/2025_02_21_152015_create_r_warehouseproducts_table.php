<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRWarehouseProductsTable extends Migration
{
    public function up()
    {


        Schema::create('r_warehouseproducts', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_warehouseproduct');
            $table->foreignId('fk_registrar')->constrained('users', 'id');
            $table->foreignId('fk_warehouse')->constrained('m_warehouses', 'pk_warehouse');
            $table->foreignId('fk_product')->constrained('m_products', 'pk_product');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
            $table->index('fk_registrar');
            $table->index('fk_warehouse');
            $table->index('fk_product');
        });


    }

    public function down()
    {
        Schema::dropIfExists('r_warehouseproducts');
    }
}
