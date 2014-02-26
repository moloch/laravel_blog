<?php

class PostLogic {

	public function viewPost($id) {
		$post = Post::find($id);
		return $post -> toArray();
	}

	public function updatePost($title, $text, $id) {
		$post = Post::find($id);
		if ($post !== null) {
			$post -> title = $title;
			$post -> text = $text;
			$post -> save();
			return $id;
		} else {
			return null;
		}
	}

	public function newPost($title, $text, $user_id) {
		$post = new Post();
		$post -> title = $title;
		$post -> text = $text;
		$post -> user_id = $user_id;
		$post -> save();
		return $post -> id;
	}

	public function deletePost($id) {
		$post = Post::find($id);
		if ($post !== null) {
			$post -> delete();
			return $id;
		} else {
			return null;
		}

	}

}
