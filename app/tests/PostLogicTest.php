<?php

class PostLogicTest extends TestCase {

	protected $post;
	protected $postLogic;
	
	public function setUp(){
		parent::setUp();
		$email = 'dario.coco@gmail.com';
		$password = '123abc';
		$user = $this->prepareTestUser($email, $password);
		$title = "A generic post";
		$text = "Das ist mein neue shiny post";
		$this -> post = $this->prepareTestPost($title, $text, $user->id);
		$this -> postLogic = new PostLogic();
	}

	public function testViewPost(){
		$post = $this -> postLogic-> viewPost($this-> post -> id);
		$this->assertTrue(is_array($post));
	}
	
	public function testUpdatePost(){
		$title = $this -> post -> title."_new";
		$text = $this -> post -> text."_new";
		$user_id = $this -> post -> user_id;
		$post_id = $this -> postLogic -> updatePost($title, $text, $user_id);
		$this -> assertFalse(is_null($post_id));
		$this -> assertEquals($post_id, $this -> post -> id);
	}
	
	public function testNewPost(){
		$title = $this -> post -> title;
		$text = $this -> post -> text;
		$user_id = $this -> post -> user_id;
		$post_id = $this -> postLogic -> newPost($title, $text, $user_id);
		$this -> assertFalse(is_null($post_id));
		$this -> assertEquals($post_id, $this -> post -> id + 1);
	}
	
	public function testDeletePost(){
		$post_id = $this -> postLogic -> deletePost($this->post -> id);
		$this -> assertFalse(is_null($post_id));
		$this -> assertEquals($post_id, $this -> post -> id);
		$post_id = $this -> postLogic -> deletePost($this->post -> id);
		$this -> assertTrue(is_null($post_id));
	}
	
	private function prepareTestUser($email, $password){
		$parameters = array(
			'email' => $email,
		 	'password' => $password,
		  	'first_name' => 'xxxxx',
		   	'last_name' => 'xxxxx',
		    'address' => 'xxxxx',
		    'city' => 'xxxxx',
		    'province' => 'XX',
		    'gender' => 'M');
		$user = new User($parameters);
		$user -> password = Hash::make($user -> password);
		$user -> save();
		return $user;
	}
	
	private function prepareTestPost($title, $text, $user_id){
		$parameters = array(
			'title' => $title,
			'text' => $text,
			'user_id' => $user_id
		);
		$post = new Post($parameters);
		$post -> save();
		return $post;
	}

}
