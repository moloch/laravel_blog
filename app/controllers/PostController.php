<?php
class PostController extends BaseController {
	
	/**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('auth.custom_token', array('only' =>
                            							array('getIndex')));
    }
	
	public function getIndex($id){
		$auth_token = Cookie::get('auth_token');
		$email = Session::get($auth_token, null);
		$post = Post::find($id);
		$params = array('email' => $email, 'post' => $post) ;
		return View::make('post',$params);
	}

}
