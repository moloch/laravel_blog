<?php

class DeleteController extends BaseController {

	public function __construct() {
		$this -> beforeFilter('auth.custom_token', array('only' => array('getIndex')));
	}
	
	public function postIndex($id){
		$auth_token = Cookie::get('auth_token');
		$email = Session::get($auth_token, null);
		$post = Post::find($id);
		$user = User::where('email', '=', $email) -> first();
		if($post !== null and $post->user_id === $user->id ){
			$post->delete();
		}
		$response = Redirect::to('/');
		return $response;
	}
	
	public function postComment(){
		
	}

}
