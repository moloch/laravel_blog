<?php

class HomepageTest extends TestCase {

	public function testHomepage() {
		$this -> createTestUser();
		$this -> createTestPost();
		$this -> login('dario.coco@gmail.com', 'ciaociao');
		$response = $this -> getHome();
		$this -> assertTrue(strpos($response->getContent(), "My new post")!==false);
		$this -> assertTrue(strpos($response->getContent(), "This is my new post")!==false);
		$this -> assertTrue(strpos($response->getContent(), "Posted by: dario.coco@gmail.com")!==false);
	}

}
