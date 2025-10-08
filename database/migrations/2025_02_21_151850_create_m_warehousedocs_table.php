<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMWarehousedocsTable extends Migration
{
    public function up()
    {


        Schema::create('m_warehousedocs', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_warehousedoc');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->foreignId('fk_warehousedoctype')->constrained('b_warehousedoctypes', 'pk_warehousedoctype');
            $table->foreignId('fk_warehouse')->constrained('m_warehouses', 'pk_warehouse');
            $table->foreignId('fk_destinationwarehouse')->nullable()->constrained('m_warehouses', 'pk_warehouse');
            $table->foreignId('fk_system')->nullable()->constrained('b_systems', 'pk_system');
            $table->foreignId('fk_invoice')->nullable()->constrained('m_invoices', 'pk_invoice');
            $table->foreignId('fk_deliverorrecipient')->nullable()->constrained('users');
            $table->date('warehousedocdate');
            $table->integer('warehousedoccode')->nullable();
            $table->string('deliverorrecipient', 45)->nullable();
            $table->integer('shipping')->nullable();
            $table->string('description', 145)->nullable();
            $table->string('attachments', 145)->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps();  // این خط کافی است
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_warehousedocs');
    }
}
