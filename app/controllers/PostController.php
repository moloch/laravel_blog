<?php
class PostController extends BaseController {
	
	/**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('auth.custom_token');
    }
	
	public function getNew(){
		return View::make('new', array('email' => $this->getEmail()));
	}

	public function postNew() {
		$user = User::where('email', '=', $this->getEmail())->first();
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
	
	public function getView($id){
		$post = Post::find($id);
		$params = array('email' => $this->getEmail(), 'post' => $post) ;
		return View::make('post',$params);
	}
	
	public function postDelete($id){
		$post = Post::find($id);
		$user = User::where('email', '=', $this->getEmail()) -> first();
		if($post !== null and $post->user_id === $user->id ){
			$post->delete();
		}
		$response = Redirect::to('/');
		return $response;
	}

}
