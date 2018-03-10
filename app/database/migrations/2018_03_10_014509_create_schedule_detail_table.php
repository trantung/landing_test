<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('schedule_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('type')->nullable();
            $table->integer('level')->nullable();
            $table->date('lesson_date')->nullable();
            $table->time('lesson_hour')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('time_id')->nullable();
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
        Schema::drop('schedule_details');
    }

}
