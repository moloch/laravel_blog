<?php
class PostController extends BaseController {

	public function showNewPostForm($id) {
		return View::make('post');
	}

	public function addPost() {
		$new_post = array('title' => Input::get('title'),
		 'body' => Input::get('body'),
		 'user_id' => Input::get('user_id'));

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
