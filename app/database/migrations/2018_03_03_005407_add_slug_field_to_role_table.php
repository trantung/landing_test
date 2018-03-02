<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugFieldToRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('roles', function($table){
            $table->string('slug', 125)->unique();
            $table->dropTimestamps();
            $table->dropSoftDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('roles', function($table)
		{
            $table->timestamps();
            $table->softDeletes();
		    $table->dropColumn(array('slug'));
		});
	}

}
