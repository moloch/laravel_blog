<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
     * Make changes to the database.
     * Create the posts table in the database
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function($table) {
            $table->increments('id');
            $table->string('post_title', 64);
            $table->text('post_body', 255);
            $table->integer('post_author');
            $table->timestamps();
        });
    }
 
    /**
     * Revert the changes to the database.
     * In this case we just drop the table
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }

}
