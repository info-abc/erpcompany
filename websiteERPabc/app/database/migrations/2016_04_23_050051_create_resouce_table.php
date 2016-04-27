<?php
 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResouceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resouce', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 256)->nullable();
			$table->string('linkFile', 256)->nullable();
			$table->string('link', 256)->nullable();
			$table->integer('status')->nullable();
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
		Schema::drop('resouce');
	}

}
