<?php
class LoginController extends BaseController {
	
	public function showLoginForm(){
		
	}

    public function login()
    {
        $username = $_POST['username'];
        $password = Crypt::decrypt($_POST['password']);
        $result = User::where('created_at', 'LIKE', '%' . $search . '%')
        			->where('updated_at', 'LIKE', '%' . $search . '%', 'OR')
       			 	->get();
    }

}