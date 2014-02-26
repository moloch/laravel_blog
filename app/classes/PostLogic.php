<?php

class PostLogic extends CRUDLogic{

	public function view($id) {
		$this -> model = Post::find($id);
		return parent::view($id);
	}

	public function update($title, $text, $id) {
		$this -> model = Post::find($id);
		return parent::update($title, $text, $id);
	}

	public function create($title, $text, $user_id, $post_id) {
		$this -> model = new Post();
		return parent::create($title, $text, $user_id, null);
	}

	public function delete($id) {
		$this -> model = Post::find($id);
		return parent::delete($id);

	}

}
