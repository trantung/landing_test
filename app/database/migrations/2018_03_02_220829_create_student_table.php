<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('students', function(Blueprint $table) {
            $table->increments('id');
            $table->string('email', 256)->nullable();
            $table->string('full_name', 256)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('address', 256)->nullable();
            $table->tinyInteger('gender')->nullable();
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
        Schema::dropIfExists('students');
    }

}
