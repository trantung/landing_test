<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('configs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('text_header', 255)->nullable();
            $table->string('price_header', 255)->nullable();
            $table->string('sale_price_header', 255)->nullable();
            $table->string('promotion_price_header', 255)->nullable();
            $table->string('text_header_common', 255)->nullable();
            $table->string('text_fee_transfer', 255)->nullable();
            $table->string('text_promotion_number', 255)->nullable();

            $table->string('image_body', 255)->nullable();
            $table->string('kind_pay', 255)->nullable();
            $table->string('fee_transfer', 255)->nullable();
            $table->string('time_export', 255)->nullable();
            $table->string('time_transfer', 255)->nullable();
            $table->string('quanity', 255)->nullable();

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
        Schema::dropIfExists('configs');
    }

}
