<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->string('receiver_name', 255)->nullable();
            $table->string('phone_name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('comment', 255)->nullable();
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
        Schema::dropIfExists('orders');
    }

}
