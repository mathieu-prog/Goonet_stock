<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="home_cuts/css/articles.css">
	<link rel="stylesheet" type="text/css" href="home_cuts/css/dashboard.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<title>Articles</title>
</head>
<body>
<?php 
require"scripts/home/dashboard_script.php";
 ?>
<div class="carddiv">

<div class="cardBox">
<div class="cardbody">
	<img src="design/images/entree.png" style="background-color:rgb(69, 131, 255);">
	<div class="desc">
		<label id="title">Les entrées</label>
		<label id="total">Total: <?php echo getNumberEntree($pdo); ?> entrées</label>
	</div>
</div>	
<span>Montant:<?php echo getAmountEntree($pdo); ?>Fbu</span>
</div>

<div class="cardBox">
	<div class="cardbody">
	<img src="design/images/sortie.png" style="background-color:#FFD230">
	<div class="desc">
		<label id="title">Les sorties</label>
		<label id="Total:">Total: <?php echo getNumberSortie($pdo); ?> sorties</label>
	</div>
</div>	
<span>Montant:<?php echo getAmountSortie($pdo); ?>Fbu</span>
</div>

<form method="POST" class="navigationdiv">	
		<select style="margin-bottom:1vw" name="comboReport" id="report" onchange="displayType()">
<option value="0">séléctionner le rapport</option>
<option value="1">rapport des achats</option>
<option value="2">rapport des ventes</option>
<option value="3">rapport des stocks disponibles</option>
</select>

	<div class="selector">
<select id="type" name="comboType">
<option value="0">Par:</option>
<option value="1">Jour</option>
<option value="2">Mois</option>
</select>
<select id="year" name="comboYear">
<option value="0">Année:</option>
<option value="1">Précedente</option>
<option value="2">Actuelle</option>
</select>
	</div>
	

<button name="btPrint"><i class="fa-solid fa-print"></i>Imprimer</button>
</form>
</div>
<h4>Analytiques</h4>
<div class="bottomdiv">
<div class="bottombody">
<div class="graphdiv">
	<div class="canva1div">
	<canvas id="mychart"></canvas>	
	</div>
</div>
<div class="graphdiv1">
	<div class="canva2div">
	<canvas id="mychartLine"></canvas>	
	</div>
</div>
<div class="activitydiv">
	<canvas id="piechart" width="50%" height="50%"></canvas>
</div>	


</div>
<div class="footer">
	<div class="element">
		<div class="elementbody">
		<i class="fa-solid fa-user"></i>
	<label>Clients</label>	
		</div>
	<span><?php echo getNumberClients($pdo); ?></span>
	</div>
	<div class="element">
		<div class="elementbody">
		<i class="fa-solid fa-users"></i>
	<label>Fournisseurs</label>	
		</div>
	<span><?php echo getNumberFrssrs($pdo); ?></span>
	</div>
	<div class="element">
		<div class="elementbody">
		<i class="fa-solid fa-shopping-bag"></i>
	<label>Articles</label>	
		</div>
	<span><?php echo getNumberArticles($pdo); ?></span>
	</div>
</div>
</div>
<?php 

 if (isset($result) || isset($error)) {
 	require"home_cuts/popups/message_popup.php";
 }
 ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<?php require"home_cuts/js/chart1.php" ?>

<script>

</script>
</body>


</html>