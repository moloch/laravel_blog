<?php

class Comment extends Eloquent {

	protected $guarded = array();

	public function user() {
		return $this -> belongs_to('User', 'user_id');
	}
	
    public function post() {
		return $this -> belongs_to('Post', 'post_id');
	}

}
