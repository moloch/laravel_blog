<?php

class RegistrationLogicTest extends TestCase {

	public function testCreateUser() {
		$parameters = array(
			'email' => 'dario.coco@gmail.com',
			'password' => 'ciaociao',
			'first_name' => 'Dario',
			'last_name' => 'Coco',
			'address' => 'Via alla boschina',
			'city' => 'Sotto il Monte',
			'province' => 'BG',
			'gender' => 'M');
		$userLogic = new UserLogic();
		$userId = $userLogic -> signup($parameters);
		$this -> assertTrue(is_int($userId));
		$user = User::find($userId);
		$this -> assertNotNull($user);
		$this -> assertEquals($user->email,$parameters['email']);
		$this -> assertTrue(Hash::check($parameters['password'],$user->password));
		$this -> assertEquals($user->first_name,$parameters['first_name']);
		$this -> assertEquals($user->last_name,$parameters['last_name']);
		$this -> assertEquals($user->address,$parameters['address']);
		$this -> assertEquals($user->city,$parameters['city']);
		$this -> assertEquals($user->province,$parameters['province']);
		$this -> assertEquals($user->gender,$parameters['gender']);

	}

}
