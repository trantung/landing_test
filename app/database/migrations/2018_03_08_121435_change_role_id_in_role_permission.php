<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRoleIdInRolePermission extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('role_permission', function($table)
		{
		    $table->dropColumn('role_id');
		});
		Schema::table('role_permission', function($table)
		{
		    $table->string('role_slug', 125)->after('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('role_permission', function($table)
		{
		    $table->dropColumn('role_slug');
		});
		Schema::table('role_permission', function($table)
		{
		    $table->integer('role_id');
		});
	}

}
