<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('notifications', function(Blueprint $table) {
            $table->increments('id');
            $table->string('sender_model')->nullable();
            $table->integer('sender_id')->nullable();

            $table->string('receiver_model')->nullable();
            $table->integer('receiver_id')->nullable();

            $table->string('title')->nullable();
            $table->mediumText('message')->nullable();
            $table->boolean('read')->default(0);
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
        Schema::dropIfExists('notifications');
    }

}
