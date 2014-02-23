<?php

class Post extends Eloquent {

	protected $guarded = array();

	public function user() {
		return $this -> belongs_to('User', 'user_id');
	}
	
    public function comments() {
		return $this -> has_many('Comment');
	}

}
