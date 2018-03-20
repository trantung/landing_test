<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('comments', function(Blueprint $table) {
            $table->increments('id');
            $table->string('model_source', 125)->nullable();
            $table->integer('source_id')->nullable();
            $table->string('model_target', 125)->nullable();
            $table->integer('target_id')->nullable();
            $table->smallInteger('votes')->nullable();
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('comments');
    }

}
