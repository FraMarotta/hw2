<!DOCTYPE html>
<html>
<head>
	<title>Si Viaggia - LOGIN </title>
	<link rel="stylesheet" type="text/css" href="{{asset('styles/login.css')}}">
	<script src="{{asset('scripts/signup.js')}}" defer = "true"></script>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form name = "signup_form" method = "post" action="signup">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="Nome" placeholder="Nome" required="">
					<input type="text" name="Cognome" placeholder="Cognome" required="">
					<input type="text" name="Username" placeholder="Username" required="">
					<div id = 'usr' class = "msg errore"> Username non disponibile</div>
					<input type="password" name="Password" placeholder="Password" required="">
					<div id ='psw' class= "msg errore">Password non rispetta i criteri di sicurezza</div>
					
					<button>Sign up</button>
					<div class = "specs">
						La Password deve contenere almeno 8 caratteri, 1 lettera maiuscola, 1 carattere numerico
					</div>
					@if(isset($error))
					<div class='errore'>{{ $error }}</div>
					@endif
				</form>

			</div>

			<div class="login">
				<form name = "login_form" method = "post" action = "login">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="Username" required="">
					<input type="password" name="password" placeholder="Password" required="" id="psw">
					<input type = 'checkbox' id = 'show'> <p>Show Password</p>
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>