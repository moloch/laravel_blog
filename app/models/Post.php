<?php

class Post extends Eloquent {

	protected $guarded = array();

	public function user() {
		return $this -> belongsTo('User', 'user_id');
	}
	
    public function comments() {
		return $this -> hasMany('Comment');
	}

}
