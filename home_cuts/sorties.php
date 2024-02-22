<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="home_cuts/css/articles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<title>Articles</title>
</head>
<body>

	<?php 
require"scripts/home/sortie_script.php";
	 ?>
<div class="artContainer">
<div class="topbar">
	

	<div id="wrapper">
		<button id="btn" onclick="openForm()"><i class="fa-regular fa-plus" style="background-color:#1EDCA0"></i>Ajouter</button>
	</div>
<form method="POST" class="searchbar" style="margin-right:0.5%;width:auto;">
		<input type="date" id="datePicker" name="txtDate" style="width:auto;">
		<button name="btDate" id="btDate" style="margin-left:1vw;transform: scaleX(1);"><i class="fa fa-check"></i></button>
	</form>
	<form method="POST" class="searchbar" style="margin-right:0.5%">
		<input type="text" name="txtSearch" placeholder="chercher par id,quantité ou pa">
		<button name="btSearch"><i class="fa fa-search" aria-hidden="true"></i></button>

	</form>

</div>
<div class="bottom">
<div class="header">
	<h3 style="width:20;">Les sorties enregistrées</h3>

<div class="navigation" style="width:80%">
<form method="POST">
		<label><i class="fa-solid fa-filter"></i>Triage:</label>
	<button name="btNormal" class="filter">Normal</button>
	<button name="btNew" class="filter">Récentes</button>
	<button name="btOld" class="filter">Anciennes</button>
	</form>	
	<div class="directionbuttons">
		<button onclick="scrollToTop()"><i class="fa-solid  fa-arrow-up"></i></button>
		<button onclick="scrollToBottom()"><i class="fa-solid  fa-arrow-down"></i></button>
	</div>
</div>
	
</div>
<div class="tablecontainer">
	<div class="tablebody" id="tablebody">
<table width="100%" id="table" style="table-layout: auto;" class="entreetable">
	<thead>
		<th>Id</th>
		<th>Date</th>
		<th>Article</th>
		<th>Quantité</th>
		<th>Provénance</th>
		<th>Déstination</th>
		<th>Observation</th>
	</thead>
	<tbody>
		<?php if ($sortiessrow!=0) { ?>
			<?php for ($i=0; $i <sizeof($noms_articles); $i++) { ?>
			<tr>
			<td><?php echo $ids[$i]; ?></td>
			<td><?php echo $dates_sorties[$i]; ?></td>
			<td style="<?php if ($noms_articles[$i]=="non disponible") {
				echo "color:red;";
			} ?>"><?php echo $noms_articles[$i]; ?></td>
			<td><?php echo $qts_sorties[$i]; ?></td>
			<td style="<?php if (str_contains($noms_source[$i], "non disponible")) {
				echo "color:red;";
			} ?>"><?php echo $noms_source[$i]; ?></td>
			<td style="<?php if (str_contains($noms_dest[$i], "non disponible")) {
				echo "color:red;";
			} ?>"><?php echo $noms_dest[$i]; ?></td>
			<td><?php echo $obs_sorties[$i]; ?></td>
				
			</tr>
		
		<?php }  ?>
		<?php }
		?>
		
	</tbody>
</table>
	</div>
	
</div>
</div>

</div>

<?php 
require"home_cuts/popups/sortie_popup.php";
 ?>
 <?php 

 if (isset($result) || isset($error)) {
 	require"home_cuts/popups/message_popup.php";
 }
 ?>


</body>


<?php 
require"home_cuts/js/sortie_js.php";
 ?>

</html>