<?php
class PostController extends BaseController {

	public function showNewPostForm($id) {
		return View::make('post');
	}

	public function addPost() {
		$new_post = array('post_title' => Input::get('post_title'),
		 'post_body' => Input::get('post_body'),
		 'post_author' => Input::get('post_author'));

		$rules = array('post_title' => 'required|min:3|max:64', 'post_body' => 'required|min:10');

		$validation = Validator::make($new_post, $rules);
		if ($validation -> fails()) {
			return Response::json("KO");
		}
		// create the new post after passing validation
		$post = new Post($new_post);
		$post -> save();
		// redirect to viewing all posts
		return Response::json("OK");
	}

}
