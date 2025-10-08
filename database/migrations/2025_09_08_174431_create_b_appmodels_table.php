<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('b_appmodels', function (Blueprint $table) {
            $table->bigIncrements('pk_appmodel');
            $table->string(column: 'appmodel');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_appmodels');
    }
};
