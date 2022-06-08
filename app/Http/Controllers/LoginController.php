<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use User as User;

class LoginController extends Controller
{
    public function login(){
            $request = request();
            if(isset($request['username']) && isset($request['password'])){
                $user = User::where('Username', $request['username'])
                                ->where('Password', $request['password'])->first();
                if($user){
                    session(['Username' => $request['username']]);
                    return redirect('logged_home');
                }
                else return view('login_signup')->with('error', 'credenziali errate');
            }   
    }
}
?>