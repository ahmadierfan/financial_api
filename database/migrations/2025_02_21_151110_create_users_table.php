<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_persian_ci';
            $table->bigIncrements('id');
            $table->foreignId('fk_company')->nullable()->constrained('m_companies', 'pk_company');
            $table->foreignId('fk_agency')->nullable()->constrained('m_agencies', 'pk_agency');
            $table->foreignId('fk_registrar')->nullable()->constrained('users', );
            $table->foreignId('fk_accountingsub')->nullable();
            $table->foreignId('fk_useraddress')->nullable()->constrained('s_useraddresses', 'pk_useraddress');
            $table->bigInteger('subscriptionid')->nullable()->unique();
            $table->string('name', 255)->nullable()->collation('utf8mb4_persian_ci');
            $table->string('lastname', 255)->nullable()->collation('utf8mb4_persian_ci');
            $table->string('nationalcode', 45)->nullable()->collation('utf8mb4_persian_ci')->unique();
            $table->date('birthday')->nullable();
            $table->string('mobile', 20)->nullable()->unique();
            $table->string('phone', 20)->nullable()->unique();
            $table->string('email', 45)->nullable()->unique();
            $table->string('image', 145)->nullable();
            $table->dateTime('lastlogin')->nullable();
            $table->tinyInteger('isactive')->default(1);
            $table->string('password', 145)->nullable();
            $table->string('firstrelativename', 255)->nullable();
            $table->string('firstrelativephone', 255)->nullable();
            $table->string('secondrelativename', 255)->nullable();
            $table->string('secondrelativephone', 255)->nullable();
            $table->string('attachments', 255)->nullable();
            $table->string('descriptions', 255)->nullable();
            $table->string('notificationtoken', 255)->nullable();
            $table->tinyInteger('isimported')->nullable();
            $table->tinyInteger('isblock')->nullable();
            $table->tinyInteger('isavailable')->default(1);
            $table->tinyInteger('isenable')->default(1);
            $table->timestamps(0);

            $table->index(['fk_agency', 'fk_company', 'fk_registrar', 'fk_useraddress']);
        });


    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
