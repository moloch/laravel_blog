<?php
class RegistrationController extends BaseController {

	public function getIndex() {
		return View::make('register');
	}

	public function postIndex() {
		$rules = array(
		 'email' => 'required|email', 
		 'password' => 'required',
		 'first_name' => 'required',
		 'last_name' => 'required');
		$validator = Validator::make(Input::all(), $rules);
		if ($validator -> fails()) {
			return Response::json("KO");
		}
		$user = new User(Input::all());
		$user -> password = Hash::make(Input::get("password"));
		$user -> save();
		return Response::json("OK");
	}

}
