<?php

class LoginTest extends TestCase {

	public function testPostLogin() {
		$this -> createTestUser();
		$response = $this -> login('dario.coco@gmail.com','ciaociao');
		$this -> assertEquals($response -> getContent(), 'Login successful');
		$response = $this -> login('dario.coco@gmail.com','ciaociao123');
		$this -> assertEquals($response -> getContent(), 'Invalid username or password');
		$response = $this -> login('dario.coco666@gmail.com','ciaociao123');
		$this -> assertEquals($response -> getContent(), 'Invalid username or password');
	}
	
	private function login($email, $password){
		$parameters = array('email' => $email, 'password' => $password);
		$crawler = $this -> client -> request('POST', 'login', $server = $parameters);
		$response = $this -> client -> getResponse();
		return $response;
	}

}
