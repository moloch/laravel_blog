<?php

class CommentLogic extends CRUDLogic{

	public function view($id) {
		$this -> model = Comment::find($id);
		return parent::view($id);
	}

	public function update($title, $text, $id) {
		$this -> model = Comment::find($id);
		return parent::update(null, $text, $id);
	}

	public function create($title, $text, $user_id, $post_id) {
		$this -> model = new Comment();
		return parent::create(null, $text, $user_id, $post_id);
	}

	public function delete($id) {
		$this -> model = Comment::find($id);
		return parent::delete($id);

	}

}