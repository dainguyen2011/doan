<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageProductsTable extends Migration
{
    public function up()
    {
        Schema::create('image_products', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('image_products');
    }
}
