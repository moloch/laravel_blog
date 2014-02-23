<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication() {
		$unitTesting = true;

		$testEnvironment = 'testing';

		return
		require __DIR__ . '/../../bootstrap/start.php';
	}

	/**
	 * Migrates the database and set the mailer to 'pretend'.
	 * This will cause the tests to run quickly.
	 *
	 */
	private function prepareForTests() {
		Artisan::call('migrate');
		Mail::pretend(true);
	}

	/**
	 * Default preparation for each test
	 *
	 */
	public function setUp() {
		parent::setUp();
		// Don't forget this!

		$this -> prepareForTests();
	}

	public function createTestUser() {
		$parameters = array('email' => 'dario.coco@gmail.com', 'password' => 'ciaociao', 'first_name' => 'Dario', 'last_name' => 'Coco', 'address' => 'Via alla boschina', 'city' => 'Sotto il Monte', 'province' => 'BG', 'gender' => 'M');
		$user = new User($parameters);
		$user -> password = Hash::make($user -> password);
		$user -> save();
	}

	public function createTestPost() {
		$parameters = Array('title' => 'My new post', 'body' => 'This is my new post', 'user_id' => 1);
		$post = new Post($parameters);
		$post -> save();
	}

	protected function login($email, $password) {
		$parameters = array('email' => $email, 'password' => $password);
		$crawler = $this -> client -> request('POST', 'login', $server = $parameters);
		$response = $this -> client -> getResponse();
		return $response;
	}

	protected function getHome() {
		$crawler = $this -> client -> request('GET', '/');
		$response = $this -> client -> getResponse();
		return $response;
	}

}
