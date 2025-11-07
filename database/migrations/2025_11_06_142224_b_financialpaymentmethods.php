<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('b_financialpaymentmethods', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_financialpaymentmethod');
            $table->string('financialpaymentmethod', 255)->nullable()->collation('utf8mb4_persian_ci');
            $table->tinyInteger('isinpay')->default(1);
            $table->tinyInteger('isinreceive')->default(1);
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
