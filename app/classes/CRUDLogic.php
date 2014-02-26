<?php

class CRUDLogic {

	protected $model;

	public function view($id) {
		$model = $this -> model;
		return $model -> toArray();
	}

	public function update($title, $text, $id) {
		$model = $this -> model;
		if ($model !== null) {
			if ($title !== null) {
				$model -> title = $title;
			}
			$model -> text = $text;
			$model -> save();
			return $id;
		} else {
			return null;
		}
	}

	public function create($title, $text, $user_id, $post_id) {
		$model = $this -> model;
		if ($title !== null) {
			$model -> title = $title;
		}
		$model -> text = $text;
		$model -> user_id = $user_id;
		if ($post_id !== null) {
			$model -> post_id = $post_id;
		}
		$model -> save();
		return $model -> id;
	}

	public function delete($id) {
		$model = $this -> model;
		if ($model !== null) {
			$model -> delete();
			return $id;
		} else {
			return null;
		}

	}

}
