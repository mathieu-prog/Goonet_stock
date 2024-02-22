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
require"scripts/home/entree_script.php";
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
	<h3 style="width:20;">Les entrees enregistrées</h3>

<div class="navigation" style="width:80%">
<form method="POST">
		<label><i class="fa-solid fa-filter"></i>Triage:</label>
	<button name="btNormal" class="filter">Normal</button>
	<button name="btNew" class="filter">Récentes</button>
	<button name="btOld" class="filter">Anciennes</button>
	<button name="btPaid" class="filter">Payés</button>
	<button name="btUnpaid" class="filter">Non payés</button>
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
		<th>PA</th>
		<th>PT</th>
		<th>Provénance</th>
		<th>Déstination</th>
		<th>Observation</th>
		<th>Status</th>
		<th style="text-align:end;">Option</th>
	</thead>
	<tbody>
		<?php if ($Entreesrow!=0) { ?>
			<?php for ($i=0; $i <sizeof($noms_articles); $i++) { ?>
			<tr>
			<td><?php echo $ids[$i]; ?></td>
			<td><?php echo $dates_entree[$i]; ?></td>
			<td style="<?php if ($noms_articles[$i]=="non disponible") {
				echo "color:red;";
			} ?>"><?php echo $noms_articles[$i]; ?></td>
			<td><?php echo $qts_entree[$i]; ?></td>
			<td><?php echo $pas_article[$i]; ?></td>
			<td><?php echo $pts_entree[$i]; ?></td>
			<td style="<?php if (str_contains($noms_source[$i], "non disponible")) {
				echo "color:red;";
			} ?>"><?php echo $noms_source[$i]; ?></td>
			<td style="<?php if (str_contains($noms_dest[$i], "non disponible")) {
				echo "color:red;";
			} ?>"><?php echo $noms_dest[$i]; ?></td>
			<td><?php echo $obs_entree[$i]; ?></td>
			<td><label  id="card" style="background: <?php if ($etats[$i]=="payé") {
				echo "green";
			}
			 ?>;"><?php echo $etats[$i]; ?></label></td>
			<td style="display:flex;gap: 0.5vw;justify-content: end;" di>
				<div style="display:flex;justify-content:center; width: 50%;" class ="reaprodiv">
					<button id="btnReapro" title="Reapprovisionner" value="<?php echo $ids[$i]; ?>"><i class="fa-solid fa-edit" style="color:#F5C433;float: right;"></i></button>
					
				</div>
				<?php if ($etats[$i]=="payé")  { ?>
				<div style="display:flex;justify-content:center; width: 50%;">
					<button id="btDesapprove" title="Desapprover" value="<?php echo $ids[$i]; ?>" onclick="showConfirm(this,'false');"><i class="fa-solid fa-close" style="color:red;float: right;"></i></button>
					
				</div>
				<?php } else { ?>
					<div style="display:flex;justify-content:center; width: 50%;">
					<button id="btApprove" title="Approver" value="<?php echo $ids[$i]; ?>" onclick="showConfirm(this,'true');"><i class="fa-solid fa-check" style="color:green;float: right;"></i></button>
					
				</div>
				<?php }
				 ?>
				
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
require"home_cuts/popups/entree_popup.php";
 ?>
<?php 

 if (isset($result) || isset($error)) {
 	require"home_cuts/popups/message_popup.php";
 }
 ?>

</body>


<?php 
require"home_cuts/js/entree_js.php";
 ?>

</html>