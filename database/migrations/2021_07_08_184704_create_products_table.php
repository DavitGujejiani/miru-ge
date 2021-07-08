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
            $table->id();
            $table->string('name_en');
            $table->string('name');
            $table->string('movement');
            $table->string('sex');
            $table->boolean('is_new')->default(false);
            $table->integer('price');
            $table->boolean('is_discounted')->default(false);
            $table->integer('discount_price')->nullable();
            $table->boolean('show_on_website')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->text('description');
            $table->text('list_description')->nullable();
            $table->string('image');
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
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
