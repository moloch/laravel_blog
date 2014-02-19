<?php

class Post extends Eloquent {

	protected $guarded = array();

	public function user() {
		return $this -> belongs_to('User', 'post_author');
	}

}
