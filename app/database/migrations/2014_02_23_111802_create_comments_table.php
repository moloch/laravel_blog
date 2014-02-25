<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

  /**
     * Make changes to the database.
     * Create the posts table in the database
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function($table) {
            $table->increments('id');
            $table->text('text', 255);
            $table->integer('post_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('post_id')->references('id')->on('posts');
        });
    }
 
    /**
     * Revert the changes to the database.
     * In this case we just drop the table
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }

}
