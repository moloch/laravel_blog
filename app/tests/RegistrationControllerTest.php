<?php

class RegistrationControllerTest extends TestCase {

	public function testGetRegister()
	{
		$crawler = $this->client->request('GET', 'register');
		$this->assertTrue($this->client->getResponse()->isOk());
	}
	
	public function testPostRegister()
	{
		$parameters = array(
		 'email' => 'dario.coco@gmail.com', 
		 'password' => 'ciaociao',
		 'first_name' => 'Dario',
		 'last_name' => 'Coco',
		 'address' => 'Via alla boschina',
		 'city' => 'Sotto il Monte',
		 'province' => 'BG',
		 'gender' => 'M');
		$crawler = $this->client->request('POST', 'register', $server=$parameters);
        $response = $this->client->getResponse();
		$user = User::find("1");
		$this->assertTrue(Hash::check('ciaociao',$user->password));
		$this->assertEquals($response->getData(), 'OK');
	}

}