<?php 
namespace App\Http\Controllers;

use Auth;
use Request;

class CustomAuth extends Controller {

    public function getLogin() {
        return view('auth.clogin'); //or just use the default login page
    }

    public function postLogin() {
        $user_username = Request::input('user_username');
        $user_pwd = Request::input('user_pwd');
            
//        if (Auth::attempt(['username' => $username, 'password' => $password, 'activeFlag' => 1]))
//        if (Auth::attempt(['user_username' => $user_username, 'user_pwd' => $user_pwd, 'user_isactive' => 1]))
        if (Auth::attempt(['user_username' => $user_username]))
        {
            //echo "success";
            return "success";
            return redirect('home');
        }
        else {
            return "fail";
        }
    }
}

