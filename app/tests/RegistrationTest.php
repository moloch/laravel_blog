<?php

class RegistrationTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testRegister()
	{
		$crawler = $this->client->request('GET', 'register');
        echo $this->client->getResponse();
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
		var_dump($user);
		var_dump($user->password);
		var_dump(Crypt::decrypt($user->password));
		$this->assertEquals($response->getData(), 'OK');
	}

}