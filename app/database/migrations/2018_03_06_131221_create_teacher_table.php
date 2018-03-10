<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('teachers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->nullable();
            $table->string('email', 256)->nullable();
            $table->string('phone', 256)->nullable();
            $table->string('password', 256)->nullable();
            $table->string('username', 256)->nullable();
            $table->string('image_url', 256)->nullable();
            $table->text('note')->nullable();
            $table->date('date_register')->nullable();
            $table->string('banking_number')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::drop('teachers');
    }


}
