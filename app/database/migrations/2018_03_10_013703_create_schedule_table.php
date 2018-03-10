<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('schedules', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->nullable();
            $table->integer('lesson_per_week')->nullable();
            $table->integer('lesson_number')->nullable();
            $table->integer('type')->nullable();
            $table->integer('level')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('lesson_duration')->nullable();
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
        Schema::drop('schedules');
    }

}
