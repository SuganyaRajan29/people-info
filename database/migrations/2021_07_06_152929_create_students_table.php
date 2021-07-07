<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('students', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name', 191);
			$table->string('height', 30);
			$table->string('mass', 30);
			$table->string('hair_color', 30);
			$table->string('skin_color', 30);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('students');
	}
}
?>