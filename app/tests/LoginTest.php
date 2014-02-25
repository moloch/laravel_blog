<?php

class LoginTest extends TestCase {

	public function testPostLogin() {
		$this -> createTestUser();
		$response = $this -> login('dario.coco@gmail.com','ciaociao');
		$this -> assertRedirectedTo('/');
		$response = $this -> login('dario.coco@gmail.com','ciaociao123');
		$this -> assertEquals($response -> getContent(), 'Invalid username or password');
		$response = $this -> login('dario.coco666@gmail.com','ciaociao123');
		$this -> assertEquals($response -> getContent(), 'Invalid username or password');
	}

}
