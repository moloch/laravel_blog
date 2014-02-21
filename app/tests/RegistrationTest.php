<?php

class RegistrationTest extends TestCase {

	public function testRegister()
	{
		$crawler = $this->client->request('GET', 'register');
		$this->assertTrue($this->client->getResponse()->isOk());
	}
	
	public function testSubmitRegister()
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
		$this->assertEquals(Crypt::decrypt($user->password), 'ciaociao');
		$this->assertEquals($response->getData(), 'OK');
	}

}