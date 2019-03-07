<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('product_order', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->string('quantity', 255)->nullable();
            $table->string('price', 255)->nullable();
            $table->string('total_price', 255)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('product_order');
    }

}
