<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBApisTable extends Migration
{
    public function up()
    {


        Schema::create('b_apis', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_api');
            $table->foreignId('fk_apitype')->nullable()->constrained('b_apitypes', 'pk_apitype');
            $table->string('api', 245)->nullable();
            $table->tinyInteger('isenable')->default(1)->nullable();
            $table->timestamps(0); // برای ایجاد `created_at` و `updated_at`
        });


    }

    public function down()
    {
        Schema::dropIfExists('b_apis');
    }
}
