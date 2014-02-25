<?php
class NewController extends BaseController {
	
	/**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('auth.custom_token', array('only' =>
                            							array('getIndex', 'postIndex')));
    }

	public function getIndex(){
		$auth_token = Cookie::get('auth_token');
		$email = Session::get($auth_token, null);
		return View::make('new', Array('email' => $email));
	}

	public function postIndex() {
		
		$auth_token = Cookie::get('auth_token');
		$email = Session::get($auth_token, null);
		$user = User::where('email', '=', $email)->first();
		$new_post = array('title' => Input::get('title'),
		 'body' => Input::get('text'),
		 'user_id' => $user->id);

		$rules = array('title' => 'required|min:3|max:64', 'body' => 'required|min:10');

		$validation = Validator::make($new_post, $rules);
		if ($validation -> fails()) {
			return Response::json("KO");
		}
		// create the new post after passing validation
		$post = new Post($new_post);
		$post -> save();
		// redirect to viewing all posts
		return Response::json("array('post_id' => ".$post->id.")");
	}

}
