<?php
class LoginController extends BaseController {
	
	public function postIndex(){
        $email = Input::get("email");
        $password = Input::get("password");
        $user = User::where('email', '=', $email)
       			 	->first();
		if($user!=null and Hash::check($password, $user->password))
			return "Login successful";
		else 
			return "Invalid username or password";
		//return  Response::json(bin2hex(openssl_random_pseudo_bytes(32)));
	}

}