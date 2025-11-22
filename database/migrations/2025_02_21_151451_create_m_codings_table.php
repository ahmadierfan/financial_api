<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCodingsTable extends Migration
{
    public function up()
    {


        Schema::create('m_codings', function (Blueprint $table) {
            $table->bigIncrements('pk_coding');
            $table->foreignId('fk_registrar')->constrained(table: 'users');

            // نشان می دهد که کدام تفصیلی در این حساب قابل استفاده است
            $table->foreignId('fk_accountingsubgroup')->constrained('b_accountingsubgroups', 'pk_accountingsubgroup');

            // برای محاسبه سود و زیان احباری اتوماتیک هستش
            $table->foreignId('fk_codingtype')->nullable()->constrained('b_codingtypes', 'pk_codingtype');
            $table->foreignId('fk_coding')->nullable()->constrained('m_codings', 'pk_coding');

            // ماهیت حساب که بدهکار است یا بستاکار 
            $table->foreignId('fk_codingnature')->constrained('b_codingnatures', 'pk_codingnature');

            $table->string('coding', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci');
            $table->integer('codingcode');

            //اینکه در سود و زیان محاسبه شود یا خیر
            $table->integer('is_pl')->default(0);

            $table->integer('isactive')->default(1);

            //آیا انتخاب تفصیلی اجباری هستش یا خیر
            $table->integer('isforcesub')->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });


    }

    public function down()
    {
        Schema::dropIfExists('m_codings');
    }
}
