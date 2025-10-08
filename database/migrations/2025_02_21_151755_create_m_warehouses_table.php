<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMWarehousesTable extends Migration
{
    public function up()
    {


        Schema::create('m_warehouses', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_warehouse');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->foreignId('fk_user')->constrained('users');
            $table->foreignId('fk_accountingsub')->nullable()->constrained('s_accountingsubs', 'pk_accountingsub');
            $table->string('warehouse')->nullable();
            $table->string('warehousesec')->nullable();
            $table->string('warehousecode')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('isactive')->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0); // برای ایجاد `created_at` و `updated_at`
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_warehouses');
    }
}
