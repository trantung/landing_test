<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('comment_orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->string('time', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('comment', 255)->nullable();
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
        Schema::dropIfExists('comment_orders');
    }
}
