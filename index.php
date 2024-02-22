<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="design/fontawesome/all.css">
	 <link href="logo1.jpg" rel="icon">
	<link rel="stylesheet" href="design/fontawesome/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="design/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="design/css/index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
	<script type="text/javascript" src="design/bootstrap/bootstrap.min.js"></script>

	<title>Login</title>
</head>
<body>
	<?php 
	require"scripts/connection/connection_db.php";
require"scripts/index_scripts.php";
	 ?>
	
<section>

	<div class="container min-vh-100 d-flex justify-content-center align-items-center">
	 
			
					<img src="design/images/logo1.jpg" style="margin-right: 2vw; border-radius:30vw; box-shadow: 2px 0px 7px white;width: 30vw; height: 30vw;">
					
<div class="subContainer" style="display:flex; flex-direction: column;">


	<form method="POST" enctype="multipart/form-data" id="loginpop">

					<h2 class="text-center"><i class="fa-solid fa-user" style="margin-right:10px;"></i>Authentification</h2>

					<div class="inputBox">
						<input type="text" name="email" class="form-control" required="required" autofocus>
						<span>Id ou email</span>
					</div>
						<div class="inputBox">
						<input type="password" name="password" class="form-control" required="required" autofocus>
						<span>Mot de passe</span>
					</div>
					<a href="#" style="color:#2F005A;">Mot de passe oublié?</a>
					<div class="mb-2">
						<button name="logBtn" class="btn btn-primary mb-2">se connecter <i class="fa-solid fa-sign-in"></i> </button>
					</div>
					
					</form>

 	<form method="POST" enctype="multipart/form-data" id="signuppop">

					<h2 class="text-center">Inscription</h2>
					<div class="mb-2">
						<label  class="form-label mb-0">Votre nom</label>
						<div style="display:flex; column-gap: 5px;">
						<input type="text" name="signFName" class="form-control" placeholder="nom" required>
						<input type="text" name="signLName" class="form-control" placeholder="prenom" required>
						</div>
					</div>
					
					<div class="mb-2">
						<label  class="form-label mb-0">Email</label>
						<input type="email" name="signEmail" class="form-control" placeholder="Email" required>
					</div>
					
					<div class="mb-2">
						<label  class="form-label text-center">Sexe</label>
						<div style="display:flex; column-gap: 5px; justify-content: center;">
						<div class=" form-check">
						<input type="checkbox" name="checkGender[]" class="form-check-input" checked id="checkM" value="male" onclick="setGender('M')">
						<label  class="form-check-label">Masculin</label>
					</div>
					<div class="form-check">
						<input type="checkbox" name="checkGender[]" class="form-check-input" id="checkF" value="female" onclick="setGender('F')">
						<label  class="form-check-label">Feminin</label>
					</div>
					<div class=" form-check">
						<input type="checkbox" name="checkGender[]" class="form-check-input" id="checkO" value="other" onclick="setGender('O')">
						<label  class="form-check-label">autre</label>
					</div>
						</div>
					</div>
					<div class="mb-2">
						<label  class="form-label mb-0">Mot de passe</label>
						<input type="password" name="signPass" class="form-control" required>
					</div>
					<div class="mb-2">
						<label  class="form-label mb-0">Confirmer mot de passe</label>
						<input type="password" name="signConf" class="form-control" required>
					</div>
					
					<div class="mb-2">
						<button name="signBtn" class="btn btn-primary mb-2">S'inscrire</button>
					</div>
					
			
</form>
	<div class="buttonsDiv" style="display:flex; margin-right: 1.4vw;">
<button id="btn1" onclick="login()">Se connecter</button>

						<button class="btn" id="btn2" onclick="signup()">Creer un compte</button>

</div>
	
 

				

</div>

</section>
<?php 

 if (isset($result) || isset($error)) {
 	require"home_cuts/popups/message_popup.php";
 }
 ?>
	<script>
	
	var x= document.getElementById("loginpop");
	var y= document.getElementById("signuppop");
	var btn1=document.getElementById("btn1");
	var btn2=document.getElementById("btn2");
	function signup(){
		y.style.display="block";
		x.style.display="none";
		btn2.style.display="none";
		btn1.style.display="block";

	}
	function login(){
	y.style.display="none";
		x.style.display="block";
	btn1.style.display="none";
		btn2.style.display="block";
	}

	function setGender(type){
		var male=document.getElementById("checkM");
		var female=document.getElementById("checkF");
		var other=document.getElementById("checkO");
		if (type=='M') {
			female.checked=false;
			other.checked=false;
			male.checked=true;
		}else if (type=='F') {

			female.checked=true;
			other.checked=false;
			male.checked=false;

		}else if (type=='O') {

			female.checked=false;
			other.checked=true;
			male.checked=false;
		}

	}
	y.style.display="none";
	btn1.style.display="none";
	
</script>
</body>

</html>