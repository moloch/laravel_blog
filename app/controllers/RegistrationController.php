<?php
class RegistrationController extends BaseController {

	public function showRegistrationForm() {
		return View::make('register');
	}

	public function submitRegistrationForm() {
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
		$user -> password = Crypt::encrypt(Input::get("password"));
		$user -> save();
		return Response::json("OK");
	}

}
