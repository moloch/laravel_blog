<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up() {
		Schema::create('users', function($table) {
			$table -> increments('id');
			$table -> string('email') -> unique();
			$table -> string('password');
			$table -> string('last_name','30');
			$table -> string('first_name','30');
			$table -> text('address');
			$table -> text('city');
			$table -> string('province','2');
			$table -> string('gender','1');
			$table -> timestamps();
		});
	}

	public function down() {
		Schema::drop('users');
	}

}
