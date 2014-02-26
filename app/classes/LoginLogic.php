<?php

class LoginLogic {

	public function login($email, $password) {
		$user = User::where('email', '=', $email) -> first();
		if ($user != null and Hash::check($password, $user -> password)) {
			return bin2hex(openssl_random_pseudo_bytes(32));
		} else
			return null;
	}

}
