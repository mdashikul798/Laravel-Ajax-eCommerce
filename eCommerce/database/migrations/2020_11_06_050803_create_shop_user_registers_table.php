<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopUserRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_user_registers', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone_number', 15)->nullable();
            $table->string('password', 100);
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('newsLeter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_user_registers');
    }
}
