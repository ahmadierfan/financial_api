<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSUseraddressesTable extends Migration
{
    public function up()
    {


        Schema::create('s_useraddresses', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_useraddress');
            $table->foreignId('fk_user')->constrained('users');
            $table->foreignId('fk_currentprvince')->nullable()->constrained('b_provinces', 'pk_province');
            $table->string('useraddress', 45)->nullable();
            $table->string('address', 45)->nullable();
            $table->string('postal_address', 45)->nullable();
            $table->string('address_compact', 45)->nullable();
            $table->string('last', 45)->nullable();
            $table->string('name', 45)->nullable();
            $table->string('country', 45)->nullable();
            $table->string('province', 45)->nullable();
            $table->string('rural_district', 45)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('village', 145)->nullable();
            $table->string('region', 45)->nullable();
            $table->string('neighborhood', 45)->nullable();
            $table->string('street', 45)->nullable();
            $table->string('plaque', 45)->nullable();
            $table->string('postal_code', 45)->nullable();
            $table->string('lat', 45)->nullable();
            $table->string('lon', 45)->nullable();
            $table->string('type', 45)->nullable();
            $table->string('coordinates', 45)->nullable();
            $table->string('floorunit', 45)->nullable();
            $table->integer('isactive')->nullable();
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });
    }

    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn('users', 'fk_useraddress')) {
                    $table->dropForeign(['fk_useraddress']);
                }
            });
        }
        Schema::dropIfExists('s_useraddresses');
    }
}
