<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSWarehousedocdetailsTable extends Migration
{
    public function up()
    {




        Schema::create('s_warehousedocdetails', function (Blueprint $table) {


            $table->charset = 'utf8mb4';


            $table->collation = 'utf8mb4_persian_ci';


            $table->bigIncrements('pk_warehousedocdetail');


            $table->foreignId('fk_registrar')->constrained('users', 'id');


            $table->foreignId('fk_warehousedoc')->constrained('m_warehousedocs', 'pk_warehousedoc');


            $table->foreignId('fk_product')->constrained('m_products', 'pk_product');


            $table->foreignId('fk_unit')->nullable()->constrained('b_units', 'pk_unit');


            $table->unsignedBigInteger('feeprice');


            $table->unsignedInteger('count');


            $table->unsignedBigInteger('totalprice');


            $table->integer('discountpercent')->nullable();


            $table->bigInteger('discountamount')->nullable();


            $table->integer('taxpercent')->nullable();


            $table->bigInteger('taxamount')->nullable();


            $table->unsignedBigInteger('finalprice')->nullable();


            $table->date('expiredate')->nullable();


            $table->string('description', 245)->nullable()->charset('utf8mb4')->collation('utf8mb4_persian_ci');


            $table->tinyInteger('isenable')->default(1);


            $table->timestamps(0);


            $table->index('fk_registrar');


            $table->index('fk_warehousedoc');


            $table->index('fk_product');


            $table->index('fk_unit');


        });



    }

    public function down()
    {
        Schema::dropIfExists('s_warehousedocdetails');
    }
}
