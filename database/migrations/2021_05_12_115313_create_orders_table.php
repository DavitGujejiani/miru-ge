<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('product_qty');
            $table->integer('product_price');
            $table->integer('product_full_price');
            $table->string('coupon')->nullable();
            $table->string('name');
            $table->string('lastname');
            $table->string('region');
            $table->string('street');
            $table->string('apartment');
            $table->integer('number');
            $table->text('additional_message');
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
        Schema::dropIfExists('orders');
    }
}
