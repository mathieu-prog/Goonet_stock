<?php
session_start();
//login button
if (isset($_POST['logBtn'])) { 
$logEmail=$_POST['email'];
$logPass=sha1($_POST['password']);
$getAccount=$pdo->prepare("select * from user where email_user=? and password=?");
$getAccount->execute(array($logEmail,$logPass));
        $trouv=$getAccount->rowCount();
        if ($trouv>=1) {
        $user=$getAccount->fetch();

        $_SESSION['id']=$user['id'];
        $_SESSION['name']=$user['first_name_user']; 
        $_SESSION['lname']=$user['last_name_user'];
        $_SESSION['email']=$user['email_user']; 
        
 $etat=$pdo->prepare("update user set state_user='online' where id=?");
        $etat->execute(array($_SESSION['id']));
           header("location:home.php?page=dashboard");
        
        
        }else{
            $error="Le compte avec ces informations n'existe pas!";
        }
}

//end login button

//signup button
if (isset($_POST['signBtn'])) {
	$nom=htmlentities($_POST['signFName']);
$prenom=htmlentities($_POST['signLName']);
$email=htmlentities($_POST['signEmail']);
$pwd=sha1($_POST['signPass']);
$confpwd=sha1($_POST['signConf']);
$gender=$_POST['checkGender'];
$selectedGender="";
foreach ($gender as $checkGender) {
    $selectedGender=$checkGender;
}
$verifyNom= preg_match("/^[0-9]+$/", $nom);
$verifyPrenom= preg_match("/^[0-9]+$/", $prenom);

if (!$verifyNom) {

    if (!$verifyPrenom) {
     
     $getMail=$pdo->prepare("select * from user where email_user=?");
                    $getMail->execute(array($email));
                    $getRows=$getMail->rowCount();

                    if ($getRows==0) {
                   if ($pwd==$confpwd) {
                      $insertUser=$pdo->prepare("insert into user(first_name_user,last_name_user,email_user,gender_user,password) values(?,?,?,?,?)");
                                        $insertUser->execute(array($nom,$prenom,$email,$selectedGender,$pwd));
                                        if ($insertUser) {
                                          
                                           
                                            
                                            $result="Mr/Mme ".$nom." ".$prenom." !, felicitation, vous avez cree votre compte avec succes!";
                                        }else{
                                             $error="Erreur lors de la creation de votre compte!";
                                            }
                   }else{
                   	 $error="Les mots de passes entres ne sont pas les memes";
                   }
            
                    }else{
                        $error="L'email est deja utilise!";
                    }
     
    }else{
     $error="Votre prenom doit etre alphabetique!";   
    }

}else{
    $error="Votre nom doit etre alphabetique!";
}



}

//end signup button
//create button


//end login button

 ?>