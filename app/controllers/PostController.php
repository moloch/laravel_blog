<?php
class PostController extends BaseController {
	
	/**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('auth.custom_token');
		$this->postLogic = new PostLogic();
    }
	
	public function getNew(){
		return View::make('new', array('email' => $this->getEmail()));
	}

	public function postNew() {
		$user = User::where('email', '=', $this->getEmail())->first();
		$new_post = array('title' => Input::get('title'),
		 'text' => Input::get('text'),
		 'user_id' => $user->id);

		$rules = array('title' => 'required|min:3|max:64', 'text' => 'required|min:10');

		$validation = Validator::make($new_post, $rules);
		if ($validation -> fails()) {
			return Response::json("KO");
		}
		$this -> postLogic -> create($new_post['title'], $new_post['text'], $new_post['user_id'], null);
		return Redirect::to('/');
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
		return Redirect::to('/');
	}
	
	public function getEdit($id){
		$post = Post::find($id);
		$params = array('email' => $this->getEmail(), 'post' => $post) ;
		return View::make('edit',$params);
	}
	
	public function postEdit($id){
		$user = User::where('email', '=', $this->getEmail())->first();
		$new_post = array('title' => Input::get('title'),
		 'text' => Input::get('text'),
		 'user_id' => $user->id);

		$rules = array('title' => 'required|min:3|max:64', 'text' => 'required|min:10');

		$validation = Validator::make($new_post, $rules);
		if ($validation -> fails()) {
			return Redirect::to('edit/'.$id);
		}
		$this -> postLogic -> update($new_post['title'], $new_post['text'], $id);
		return Redirect::to('/');
	}

}
