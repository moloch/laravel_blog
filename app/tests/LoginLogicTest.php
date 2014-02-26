<?php

class LoginLogicTest extends TestCase {

	public function testLogin() {
		$email = "dario.coco@gmail.com";
		$password = "123abc";
		$this -> prepareTestUser($email, $password);
		$loginLogic = new LoginLogic();
		$token = $loginLogic -> login($email, $password);
		$this -> assertTrue(is_string($token));
		$this -> assertEquals(strlen($token),64);
		$token = $loginLogic -> login($email, "xxx");
		$this -> assertTrue(is_null($token));
	}
	
	private function prepareTestUser($email, $password){
		$parameters = array(
			'email' => $email,
		 	'password' => $password,
		  	'first_name' => 'xxxxx',
		   	'last_name' => 'xxxxx',
		    'address' => 'xxxxx',
		    'city' => 'xxxxx',
		    'province' => 'XX',
		    'gender' => 'M');
		$user = new User($parameters);
		$user -> password = Hash::make($user -> password);
		$user -> save();
	}

}
