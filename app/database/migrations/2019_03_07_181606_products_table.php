<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->string('image_url', 255)->nullable();
            $table->string('color', 255)->nullable();
            $table->string('code', 255)->nullable();
            $table->string('text', 255)->nullable();
            $table->string('quantity', 255)->nullable();
            $table->string('price', 255)->nullable();
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
        Schema::dropIfExists('products');
    }

}
