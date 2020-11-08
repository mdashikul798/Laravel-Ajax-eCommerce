<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('product_name');
            $table->string('sub_title', 100)->nullable();
            $table->float('price', 10, 2);
            $table->tinyInteger('category_id');
            $table->tinyInteger('sub_category_id');
            $table->tinyInteger('brand_id');
            $table->string('tag', 50)->nullable();
            $table->string('img_url');
            $table->text('description');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('products');
    }
}
