<?php

class UserLogic{

	public function __construct(){
				
	}
	
	public function signup($parameters){
		$user = new User($parameters);
		$user -> password = Hash::make($user -> password);
		$user -> save();
		return $user -> id;
	}
	
}
