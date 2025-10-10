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
        Schema::create('b_units', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('pk_unit');
            $table->foreignId('fk_registrar')->constrained('users');
            $table->string('unit', 255)->charset('utf8mb4')->collation('utf8mb4_persian_ci');
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('m_products')) {
            Schema::table('m_products', function (Blueprint $table) {
                if (Schema::hasColumn('m_products', 'fk_secunit')) {
                    $table->dropForeign(['fk_secunit']);
                }
            });
        }
        if (Schema::hasTable('m_products')) {
            Schema::table('m_products', function (Blueprint $table) {
                if (Schema::hasColumn('m_products', 'fk_unit')) {
                    $table->dropForeign(['fk_unit']);
                }
            });
        }
        if (Schema::hasTable('s_invoicedetails')) {
            Schema::table('s_invoicedetails', function (Blueprint $table) {
                if (Schema::hasColumn('s_invoicedetails', 'fk_unit')) {
                    $table->dropForeign(['fk_unit']);
                }
            });
        }
        if (Schema::hasTable('s_warehousedocdetails')) {
            Schema::table('s_warehousedocdetails', function (Blueprint $table) {
                if (Schema::hasColumn('s_warehousedocdetails', 'fk_unit')) {
                    $table->dropForeign(['fk_unit']);
                }
            });
        }
        Schema::dropIfExists('b_units');
    }
};
