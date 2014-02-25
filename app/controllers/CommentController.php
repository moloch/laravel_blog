<?php
class CommentController extends BaseController {
	
	/**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('auth.custom_token');
    }

	public function postNew($id) {
		$user = User::where('email', '=', $this->getEmail())->first();
		$new_comment = array(
		 'text' => Input::get('text'),
		 'user_id' => $user->id,
		 'post_id' => $id);

		$rules = array('text' => 'required|min:10');

		$validation = Validator::make($new_comment, $rules);
		if ($validation -> fails()) {
			return Response::json("KO");
		}
		// create the new post after passing validation
		$comment = new Comment($new_comment);
		$comment -> save();
		return Redirect::to('/post/view/'.$id);
	}

}
