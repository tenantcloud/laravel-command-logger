<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommandLoggerTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create(config('commandlogger.db_table'), function (Blueprint $table) {
			$table->increments('id');
			$table->string('signature', 128);
			$table->float('execution_time');
			$table->integer('memory_peak');
			$table->string('host', 128);

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists(config('commandlogger.db_table'));
	}
}
