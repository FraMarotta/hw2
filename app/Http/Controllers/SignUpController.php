<?php
    namespace App\Http\Controllers;
    use Illuminate\Routing\Controller;
    use User as User;
    use Illuminate\Support\Facades\DB;
    use GuzzleHttp\Psr7\Request;
    use Illuminate\Contracts\Session\Session;

    class SignUpController extends Controller
    {   
        private function checkPwd($password){
            $len = strlen($password);
            $num = 0;
            $upp = 0;
            if($len < 8){
                return 0;
            }
        
            foreach(count_chars($password,1) as $i => $val ){
                if ($i >= 48 && $i <= 57){
                    $num = $num + $val;
                }
                if($i >= 65 && $i <= 90){
                    $upp = $upp + $val;
                }
            }
            if(($num < 1) || ($upp < 1)){
                return 0;
            }
            return 1;
        }
        
        private function checkUser($username){
            //$user = DB::table('users')->where('Username', 'Mario74')->first();
            $user = User::where('Username', '$username')->first();
            //print_r($user['Username']);
            if($user)
                return 1;
            return 0;
        }    
        
        public function signup(){
            $request = request();
            if(isset($request["Username"]) && isset($request["Password"]) && isset($request["Nome"]) && isset($request["Cognome"])){  //verifico presenza dati post	
            
                //controllo username già in uso
                if(($this->checkUser($request["Username"]))){
                    //print_r("\n no usr \n");
                    $error = "Username già in uso";
                    return view('login_signup')->with('error', $error);
                }
                //controllo criteri password
                if(!($this->checkPwd($request["Password"]))){
                    //print_r("\n no psw \n");
                    $error = "Password non rispetta i criteri di sicurezza";
                    return view('login_signup')->with('error', $error);
                }

                if(!isset($error)){
                    //print_r("\n creo user \n");
                    $newUser = new User();
                    $newUser->Nome = $request['Nome'];
                    $newUser->Cognome = $request['Cognome'];
                    $newUser->Password = $request['Password'];
                    $newUser->Username = $request['Username'];
                    $newUser->save();
                    if($newUser){
                        session(['Username' => $newUser->Username]);
                        return redirect('logged_home');
                    }
                    else
                        $error = "Registrazione non riuscita";
                        return view('login_signup')->with('error', $error);
			    } else 
                    return view('login_signup')->with('error', $error);
		    }
        }
        
        public function checkUsr($username){
            $user = User::where('Username', $username)->first();
            if($user) return 1;
            return 0;
        }
        
    }
?>
