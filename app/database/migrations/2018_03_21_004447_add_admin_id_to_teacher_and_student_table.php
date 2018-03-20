<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminIdToTeacherAndStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teachers', function(Blueprint $table) {
            $table->integer('admin_id')->after('role_id')->nullable();
        });
		Schema::table('students', function(Blueprint $table) {
            $table->integer('admin_id')->after('email')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teachers', function(Blueprint $table) {
            $table->dropColumn('admin_id');
        });
		Schema::table('students', function(Blueprint $table) {
            $table->dropColumn('admin_id');
        });
	}

}
