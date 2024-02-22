<?php 
//selection des donnees


//par articles
$getArticles=$pdo->prepare("select * from entree");
$getArticles->execute();
$rows=$getArticles->rowCount();
$noms[]=array();
$qtes[]=array();
$index=0;
if ($rows>0) {
	while ($articlesData=$getArticles->fetch()) {
		$id=$articlesData["id_article"];
		$qtes[$index]=$articlesData["quantite"];
$getValues=$pdo->prepare("select * from article where id_article=?");
$getValues->execute([$id]);
$subrow=$getValues->rowCount();

if ($subrow>0) {

while($articles=$getValues->fetch()){

$noms[$index]=$articles["nom_article"];
	$index++;
}	
}else{
$noms[$index]="indisponible";
	$index++;	
}

	}
}

//par types
$getTypes=$pdo->prepare("select * from type_stock");
$getTypes->execute();
$rows=$getTypes->rowCount();
$arts[]=array();
$index=0;
if ($rows>0) {
	while ($typeData=$getTypes->fetch()) {
		$id=$typeData["id_type"];
$getValues=$pdo->prepare("select count(id_entree) as number from entree where id_type_stock_dest=?");
$getValues->execute([$id]);
$subrow=$getValues->rowCount();

if ($subrow>0) {

while($articles=$getValues->fetch()){

$arts[$index]=$articles["number"];
	$index++;
}	
}else{
$arts[$index]=$arts[$index]+1;
	$index++;	
}

	}
}

// sorties par mois
$monthQuery=$pdo->prepare("select DATE_FORMAT(date_sortie, '%m') as date from sorties order by date_sortie desc limit 1");
$monthQuery->execute();
$monthRow=$monthQuery->rowCount();
$monthData=$monthQuery->fetch();

if ($monthRow==0) {
	$monthValue=1;
}else{
	$monthValue=$monthData['date'];
$index=0;
for ($i=1; $i <= $monthValue; $i++) { 
	$month=$i;
	if ($i<10) {
	$month='0'.$i;
	}
	$dateValue=$month.' '.$yearvalue=date("Y");
	$getQtes=$pdo->prepare("select quantite as qte from sorties where DATE_FORMAT(date_sortie, '%m %Y')=? order by date_sortie asc");
$getQtes->execute([$dateValue]);
$rows=$getQtes->rowCount();
$qtesMonth[]=array();


if ($rows>0) {
	$value=0;
	while ($qteData=$getQtes->fetch()) {
		$value=$value+$qteData["qte"];

	}
	$qtesMonth[$index]=$value;
}
$index++;
}
}


function getNumberEntree($pdo){
$getValues=$pdo->prepare("select count(id_entree) as number from entree");
$getValues->execute();
$numberValues=$getValues->fetch();
return $numberValues['number'];
}
function getAmountEntree($pdo){
$getValues=$pdo->prepare("select * from entree");
$getValues->execute();
$amount=0;
while($values=$getValues->fetch()){
$amount=$amount+$values['quantite']*$values['pa_article'];
}
return $amount;
}

function getNumberSortie($pdo){
$getValues=$pdo->prepare("select count(id_sortie) as number from sorties");
$getValues->execute();
$numberValues=$getValues->fetch();
return $numberValues['number'];
}
function getAmountSortie($pdo){
$getValues=$pdo->prepare("select sorties.quantite as quantite, entree.pa_article as pa from sorties,entree where sorties.id_article=entree.id_article");
$getValues->execute();
$amount=0;
while($values=$getValues->fetch()){
$amount=$amount+$values['quantite']*$values['pa'];
}
return $amount;
}

function getNumberClients($pdo){
$getValues=$pdo->prepare("select count(id_client) as number from client");
$getValues->execute();
$numberValues=$getValues->fetch();
return $numberValues['number'];
}
function getNumberFrssrs($pdo){
$getValues=$pdo->prepare("select count(id_fournisseur) as number from fournisseur");
$getValues->execute();
$numberValues=$getValues->fetch();
return $numberValues['number'];
}
function getNumberArticles($pdo){
$getValues=$pdo->prepare("select count(id_article) as number from article");
$getValues->execute();
$numberValues=$getValues->fetch();
return $numberValues['number'];
}

//fin donnees

//imprimer



if (isset($_POST['btPrint'])) {
	$ReportIndex=$_POST['comboReport'];
	$TypeIndex=$_POST['comboType'];
	$YearIndex=$_POST['comboYear'];

if ($ReportIndex!=0) {
	if ($ReportIndex==1) {
		if ($YearIndex!=0) {
			header("Location:printer.php?report=".$ReportIndex."&year=".$YearIndex);
		}else{
			$error="Veuillez selectionner l'annee";
		}
	}
	if ($ReportIndex==2) {
		if ($TypeIndex!=0 && $YearIndex!=0) {
			header("Location:printer.php?report=".$ReportIndex."&type=".$TypeIndex."&year=".$YearIndex);
		}else{
			$error="Veuillez selection l'annee ou le type";
		}
	
	}
}if ($ReportIndex==3) {
		if ($YearIndex!=0) {
			header("Location:printer.php?report=".$ReportIndex."&year=".$YearIndex);
		}else{
			$error="Veuillez selectionner l'annee";
		}
	}else{
$error="Veuillez selection le rapport";	
}
	
}


 ?>