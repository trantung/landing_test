<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students', function($table){
            $table->date('start_date')->after('address')->nullable();
            $table->date('birth_day')->after('phone')->nullable();
            $table->string('avatar', 225)->after('address')->nullable();
            $table->tinyInteger('level')->after('gender')->nullable();
            $table->string('source', 125)->after('gender')->nullable();
            $table->longText('comment')->after('gender')->nullable();
            $table->string('code', 125)->after('gender')->nullable();
            $table->string('parent_name')->after('gender')->nullable();
            $table->string('parent_email')->after('gender')->nullable();
            $table->string('parent_phone')->after('gender')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('students', function($table)
		{
		    $table->dropColumn(
		    	array('code', 'start_date', 'birth_day', 'avatar',
		    		'level', 'source', 'comment', 'parent_name',
		    		'parent_email', 'parent_phone')
		    );
		});
	}

}
