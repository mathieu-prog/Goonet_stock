<!DOCTYPE html>
<?php 
session_start();
 ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminitration</title>
     <link href="logo1.jpg" rel="icon">
    <link rel="stylesheet" href="design/fontawesome/all.css">
	<link rel="stylesheet" href="design/fontawesome/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="design/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="design/css/home.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
<script type="text/javascript" src="design/bootstrap/bootstrap.min.js"></script>
   </head>
<body>
<?php 
require"scripts/connection/connection_db.php";
require"scripts/home/style_script.php";
 ?>
<?php 

  if (isset($_POST['btArticles'])) {

    header("location:home.php?page=articles");

  }
  if (isset($_POST['btFournisseurs'])) {

    header("location:home.php?page=fournisseur");

  }
  if (isset($_POST['btClients'])) {

    header("location:home.php?page=client");

  }
  if (isset($_POST['btEntree'])) {

    header("location:home.php?page=entree");

  }
  if (isset($_POST['btSortie'])) {

    header("location:home.php?page=sortie");

  }
  if (isset($_POST['btDashboard'])) {

    header("location:home.php?page=dashboard");

  }

   ?>

  <div class="main_box">
    <input type="checkbox" id="check">
    <div class="btn_one">
      <label for="check">
        <i class="fas fa-bars"></i>
      </label>
    </div>
    <div class="sidebar_menu">
      <div class="logo">
        <img src="design/images/noprofile.png">
        <label><?php echo $_SESSION['name'].' '.$_SESSION['lname'] ?></label>
          </div>
        <div class="btn_two">
          <label for="check">
            <i class="fas fa-times"></i>
          </label>
        </div>
      <div class="menu">
        <ul>
          <li style="<?php if ($_GET['page']=="dashboard") {
            echo $style;
          } ?>"><form method="POST"><button name="btDashboard"><i class="fas fa-qrcode"></i>Dashboard</button></form>
          </li>
          <li style="<?php if ($_GET['page']=="articles") {
            echo $style;
          } ?>">
            <form method="POST"><button name="btArticles"><i class="fas fa-shopping-bag"></i>Articles</button></form>
          </li>
           <li style="<?php if ($_GET['page']=="entree" || $_GET['page']=="sortie") {
            echo $style;
          } ?>">
            <button name="btMouvement" onclick="displaySubmenu()"><i class="fas fa-exchange"></i>Mouvement</button>
          </li style="<?php if (isset($style)) {
            echo $style;
          } ?>">
          <div class="submenu" id="submenu" style="display:none;">
           <li>
            <form method="POST"><button name="btEntree"><i class="fas fa-arrow-circle-right"></i>Entrees</button></form>
          </li>
           <li>
            <form method="POST"><button name="btSortie"><i class="fas fa-arrow-circle-left"></i>Sorties</button></form>
          </li>
          </div>
          <li style="<?php if ($_GET['page']=="client") {
            echo $style;
          } ?>">
             <form method="POST"><button name="btClients"><i class="fas fa-users"></i>Clients</button></form>
          </li>
          <li style="<?php if ($_GET['page']=="fournisseur") {
            echo $style;
          } ?>">
            <form method="POST"><button name="btFournisseurs"><i class="fas fa-user"></i>Fournisseurs</button></form>
          </li>
          <li>
            <form method="POST"><button name="btSettings"><i class="fas fa-gear"></i>Parametres</button></form>
          </li>
          <li>
            <form method="POST"><button name="btHelp"><i class="fas fa-question-circle"></i>Aide</button></form>
          </li>
            <li id="logout">
            <i class="fas fa-sign-out"></i>
            <a href="logout.php">Se deconnecter</a>
          </li>
         
        </ul>
      </div>

    </div>
    <div style="width:100%;height: 100vh;">
      <?php 
if (isset($_GET['page'])) {
if ($_GET['page']=="articles") {
  require"home_cuts/articles.php";
}
if ($_GET['page']=="fournisseur") {
  require"home_cuts/fournisseur.php";
}
if ($_GET['page']=="client") {
  require"home_cuts/client.php";
}
if ($_GET['page']=="entree") {
  require"home_cuts/entree.php";
}
if ($_GET['page']=="sortie") {
  require"home_cuts/sorties.php";
}
if ($_GET['page']=="dashboard") {
  require"home_cuts/dashboard.php";
}
}
 
 ?>

    </div>
  </div>
  <script type="text/javascript">
var submenu=document.getElementById("submenu");
    function showSubMenu(){
      submenu.style.display="block";
    }
     function hideSubMenu(){
      submenu.style.display="none";
    }
     function displaySubmenu(){
      if(submenu.style.display=="block"){
        hideSubMenu();
      }else{
        showSubMenu();
      }
    }

  </script>
  </body>
</html>
