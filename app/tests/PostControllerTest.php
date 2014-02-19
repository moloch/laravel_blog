<?php

class PostControllerTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	
	public function testSubmitPost()
	{
		$parameters = array(
		 'post_title' => 'Il mio nuovo post', 
		 'post_body' => 'Ciao sono un nuovo bellissimo post',
		 'post_author' => '1');
		$crawler = $this->client->request('POST', 'new_post', $server=$parameters);
        $response = $this->client->getResponse();
		$post = Post::find("1");
		var_dump($post);
		$this->assertEquals($response->getData(), 'OK');
	}

}