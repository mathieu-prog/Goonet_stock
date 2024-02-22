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
require"scripts/home/fournisseurs_script.php";
	 ?>
<div class="artContainer">
<div class="topbar">
	
	<div id="wrapper">
		<button id="btn" onclick="openForm()"><i class="fa-regular fa-plus" style="background-color:#1EDCA0"></i>Ajouter</button>
	</div>
	<form method="POST" class="searchbar">
		<input type="text" name="txtSearch" placeholder="chercher nom ou prenom">
		<button name="btSearch"><i class="fa fa-search" aria-hidden="true"></i></button>

	</form>
</div>
<div class="bottom">
<div class="header">
	<h3>Les fournisseurs enregistres</h3>

<div class="navigation">
<form method="POST">
		<label><i class="fa-solid fa-filter"></i>Triage:</label>
	<button name="btNormal" class="filter">Normal</button>
	<button name="btAsc" class="filter">a-z</button>
	<button name="btDesc" class="filter">z-a</button>
	</form>	
	<div class="directionbuttons">
		<button onclick="scrollToTop()"><i class="fa-solid  fa-arrow-up"></i></button>
		<button onclick="scrollToBottom()"><i class="fa-solid  fa-arrow-down"></i></button>
	</div>
</div>
	
</div>
<div class="tablecontainer">
	<div class="tableheader">
		<label>Id</label>
		<label>Nom</label>
		<label>Prenom</label>
		<label>Societe</label>
		<label>Telephone</label>
		<label>Adresse</label>
		<label style="text-align:right;">Options</label>
	</div>
	<div class="tablebody" id="tablebody">
		<table width="100%" id="table">
	<tbody>
		<?php if ($fournisseursrow!=0) { ?>
			<?php for ($i=0; $i <sizeof($noms); $i++) { ?>
			<tr>
			<td><?php echo $ids[$i]; ?></td>
			<td style="display:none"><?php echo $ids[$i]; ?></td>
			<td><?php echo $noms[$i]; ?></td>
			<td><?php echo $prenoms[$i]; ?></td>
			<td><?php echo $societes[$i]; ?></td>
			<td><?php echo $telephones[$i]; ?></td>
			<td><?php echo $adresses[$i]; ?></td>
			<td style="display:flex;align-items: center;justify-content: end; gap: 1vw;">
				<div class="editbutton">
                <button class="btn btn-info" title="modifier" data-toggle="modal" data-target="#myModal" id="btEdit" value="<?php echo $ids[$i]; ?>"><i class="fa-solid fa-pencil"></i></button>
            </div>
			<button id="btDelete" title="supprimer" value="<?php echo $ids[$i]; ?>" onclick="showConfirm(this)"><i class="fa-solid fa-trash"></i></button>	
			</td>
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
require"home_cuts/popups/fournisseur_popup.php";
 ?>

 <?php 

 if (isset($result) || isset($error)) {
 	require"home_cuts/popups/message_popup.php";
 }
 ?>

</body>
<script type="text/javascript">
var tablescroll=document.getElementById("tablebody");
var popup=document.getElementById("popForm");
 var table=document.getElementById("table");
 var form=document.getElementById("form");
 var confirmationform=document.getElementById("confirmationform");
 var btDelete=document.getElementById("btDelete1");
function closeForm(argument) {
	popup.style.display="none";
}
function openForm(argument) {
	popup.style.display="block";
	form.style.display="block";
	confirmationform.style.display="none";
	var title=document.getElementById("title");
    var txtNom=document.getElementById("txtNom");
    var txtPrice=document.getElementById("txtPrice");
    var btAdd=document.getElementById("btAdd");
    txtNom.value="";
    txtPrice.value="";
 	title.innerHTML="Nouveau article";
    btAdd.innerHTML="Ajouter";
}

//for delete button
function showConfirm(btn) {
	popup.style.display="block";
	confirmationform.style.display="block";
	form.style.display="none";
	btDelete1.value=btn.value;

}

//for table modify button
$(document).on('click','.editbutton button', function(event) {
   
   
   var rowindex=$(this).closest('tr').index();
    var title=document.getElementById("title");
    var txtNom=document.getElementById("txtNom");
    var txtPrenom=document.getElementById("txtPrenom");
    var txtTel=document.getElementById("txtTel");
    var txtAdresse=document.getElementById("txtAdresse");
    var txtSociete=document.getElementById("txtSociete");
    var btAdd=document.getElementById("btAdd");
    txtNom.value=table.rows[rowindex].cells[2].innerHTML;
    txtPrenom.value=table.rows[rowindex].cells[3].innerHTML;
    txtSociete.value=table.rows[rowindex].cells[4].innerHTML;
    txtTel.value=table.rows[rowindex].cells[5].innerHTML;
    txtAdresse.value=table.rows[rowindex].cells[6].innerHTML;
    
 	title.innerHTML="Modification d'un fournisseur";
    btAdd.innerHTML="Modifier";
    btAdd.value=table.rows[rowindex].cells[1].innerHTML;
   popup.style.display="block";
	form.style.display="block";
	confirmationform.style.display="none";

});

//for scroll
function scrollToTop() {
	tablescroll.scrollTo(0,0);
}
function scrollToBottom(){
	tablescroll.scrollTo({ left: 0, top: tablescroll.scrollHeight, behavior: "smooth" });
}

 popup.style.display="none";
	
</script>
</html>