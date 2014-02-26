<?php

class CommentLogicTest extends TestCase {

	protected $post;
	protected $comment;
	protected $commentLogic;
	
	public function setUp(){
		parent::setUp();
		$email = 'dario.coco@gmail.com';
		$password = '123abc';
		$user = $this->prepareTestUser($email, $password);
		$title = "A generic post";
		$text = "Das ist mein neue shiny post";
		$this -> post = $this->prepareTestPost($title, $text, $user->id);
		$title = "A generic comment";
		$text = "Das ist mein neue shiny comment";
		$this -> comment = $this->prepareTestComment($text, $user->id, $this -> post -> id);
		$this -> commentLogic = new CommentLogic();
	}

	public function testViewComment(){
		$comment = $this -> commentLogic-> view($this-> comment -> id);
		$this -> assertTrue(is_array($comment));
	}
	
	public function testUpdateComment(){
		$text = $this -> comment -> text."_new";
		$user_id = $this -> comment -> user_id;
		$post_id = $this -> comment -> post_id;
		$comment_id = $this -> commentLogic -> update(null, $text, $user_id, $post_id);
		$this -> assertFalse(is_null($comment_id));
		$this -> assertEquals($comment_id, $this -> comment -> id);
	}
	
	public function testNewComment(){
		$text = $this -> comment -> text;
		$user_id = $this -> comment -> user_id;
		$post_id = $this -> comment -> post_id;
		$comment_id = $this -> commentLogic -> create(null, $text, $user_id, $post_id);
		$this -> assertFalse(is_null($comment_id));
		$this -> assertEquals($comment_id, $this -> comment -> id + 1);
	}
	
	public function testDeleteComment(){
		$comment_id = $this -> commentLogic -> delete($this->comment -> id);
		$this -> assertFalse(is_null($comment_id));
		$this -> assertEquals($comment_id, $this -> comment -> id);
		$comment_id = $this -> commentLogic -> delete($this->comment -> id);
		$this -> assertTrue(is_null($comment_id));
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
	
	private function prepareTestComment($text, $user_id, $post_id){
		$parameters = array(
			'text' => $text,
			'user_id' => $user_id,
			'post_id' => $post_id
		);
		$comment = new Comment($parameters);
		$comment -> save();
		return $comment;
	}

}
