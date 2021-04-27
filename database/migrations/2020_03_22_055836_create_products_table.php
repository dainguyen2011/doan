<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('product_image_intro');
            $table->string('full_description');
            $table->integer('category_id');
            $table->integer('ordering');
            $table->float('sale_price')->nullable();
            $table->float('price');
            $table->string('size')->nullable();
            $table->string('description');
            $table->integer('publish');
            $table->integer('product_old')->nullable();
            $table->integer('sale')->nullable();
            $table->integer('quantity');
            $table->float('price_input')->nullable();
            $table->integer('views');
            $table->float('pay');
            $table->timestamps();
            $table->softDeletes();
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
