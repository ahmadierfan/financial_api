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
        Schema::create('b_checkstatuses', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_checkstatus');
            $table->string('checkstatus');
            $table->string('checkstatussec')->nullable();
            $table->tinyInteger('isinpay')->default(1);
            $table->tinyInteger('isinreceive')->default(1);
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_checkstatuses');
    }
};
