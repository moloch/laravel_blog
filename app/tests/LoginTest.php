<?php

class LoginTest extends TestCase {

	public function testPostLogin() {
		$this -> createTestUser();
		$response = $this -> login('dario.coco@gmail.com','ciaociao');
		$this -> assertEquals($response -> getContent(), 'Login successful');
	}
	
	private function login($email, $password){
		$parameters = array('email' => $email, 'password' => $password);
		$crawler = $this -> client -> request('POST', 'login', $server = $parameters);
		$response = $this -> client -> getResponse();
		return $response;
	}

}
