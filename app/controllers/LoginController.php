<?php
class LoginController extends BaseController {

	public function postIndex() {
		$email = Input::get("email");
		$password = Input::get("password");
		$user = User::where('email', '=', $email) -> first();
		if ($user != null and Hash::check($password, $user -> password)) {
			$name = 'auth_token';
			$value = bin2hex(openssl_random_pseudo_bytes(32));
			$minutes = '15';
			Session::put($value, $email);
			$cookie = Cookie::make($name, $value, $minutes);
			$response = Redirect::to('/');
			return $response->withCookie($cookie);
		} else
			return "Invalid username or password";
	}

}
