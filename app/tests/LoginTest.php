<?php

class LoginTest extends TestCase {

	public function testPostLogin() {
		$this -> createTestUser();
		$parameters = array('email' => 'dario.coco@gmail.com', 'password' => 'ciaociao');
		$crawler = $this -> client -> request('POST', 'login', $server = $parameters);
		$response = $this -> client -> getResponse();
		$this -> assertEquals($response -> getContent(), 'Login successful');
	}

}
