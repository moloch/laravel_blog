<?php

class HomepageTest extends TestCase {

	public function testHomepage() {
		$this -> createTestUser();
		$this -> createTestPost();
		$this -> login('dario.coco@gmail.com', 'ciaociao');
		$response = $this -> getHome();
		var_dump($response->getContent());
	}

}
