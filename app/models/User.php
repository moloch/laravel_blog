<?php

class User extends Eloquent {

	protected $guarded = array();

	public function posts() {
		return $this -> hasMany('Post');
	}

}
