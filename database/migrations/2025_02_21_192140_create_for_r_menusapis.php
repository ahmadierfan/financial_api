<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('r_menusapis', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_menuapi');
            $table->foreignId('fk_menu')->constrained('b_menus', 'pk_menu');
            $table->foreignId('fk_api')->constrained('b_apis', 'pk_api');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps();
        });

        DB::statement('SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;');
        DB::statement('SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;');
        DB::statement('SET SQL_MODE=@OLD_SQL_MODE;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('for_r_menusapis');
    }
};
