<?php

class Comment extends Eloquent {

	protected $guarded = array();

	public function user() {
		return $this -> belongsTo('User', 'user_id');
	}
	
    public function post() {
		return $this -> belongsTo('Post', 'post_id');
	}

}
