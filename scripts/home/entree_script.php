<?php 

//for adding button

if (isset($_POST['btAddEntry'])) {

$idTypeStockProv=$_POST['comboProv'];
$idTypeStockDest=$_POST['comboDest'];
$idArticle=$_POST['comboArticle'];
$pa=$_POST['txtPA'];
$qte=$_POST['txtQte'];
$pyt="non payé";

if (isset($_POST['checkPyt'])) {
    $pyt="payé";
}
$idProv=null;
$idDest=null;
$obs=htmlentities($_POST['txtObs']);
if ($idTypeStockProv==2) {
    $idProv=$_POST['comboClientsProv'];
}

if ($idTypeStockProv==4) {
    $idProv=$_POST['comboFournisseursProv'];
}
if ($idTypeStockDest==2) {
    $idDest=$_POST['comboClientsDest'];
}

if ($idTypeStockDest==4) {
    $idDest=$_POST['comboFournisseursDest'];
}

     
          $insert=$pdo->prepare("insert into entree(id_article,id_type_stock_source,id_type_stock_dest, quantite,pa_article,id_source,id_destination,description,etat) values(?,?,?,?,?,?,?,?,?)");
                            $insert->execute(array($idArticle,$idTypeStockProv,$idTypeStockDest,$qte,$pa,$idProv,$idDest,$obs,$pyt));
                            if ($insert) {
                                
                                $result="Ajoute avec succes!";
                            }else{
                                 $error="Erreur lors de l'ajout d'un entree!";
                                }
}


//end adding

//for modifying state

if (isset($_POST['btModify'])) {
    $id=$_POST['btModify'];
    $oldstate=getState($id,$pdo);
    $state="payé";
    if ($oldstate=='payé') {
    $state="non payé";
    }
    $modifyState=$pdo->prepare("update entree set etat=? where id_entree=?");
                            $modifyState->execute(array($state,$id));
                            if ($modifyState) {
                                
                                $result="modifie avec succes!";
                            }else{
                                 $error="Erreur lors de la modfication de l'etat!";
                                }

}
//for modifying stocked

if (isset($_POST['btReapro'])) {
    $id=$_POST['btReapro'];
    $qte=$_POST['txtNewQte'];
     $pa=$_POST['txtNewPA'];
    $obs=$_POST['txtNewObs'];
    $oldQte=getOldQuantiy($id,$pdo);
    $newQte=$oldQte+$qte;
    $restock=$pdo->prepare("update entree set quantite=?,pa_article=?, description=? where id_entree=?");
                            $restock->execute(array($newQte,$pa,$obs,$id));
                            if ($restock) {
                                
                                $result="reapprovisionnee avec succes!";
                            }else{
                                 $error="Erreur lors de la reapprovisionnement de l'article!";
                                }
                                
}




//for getting

if (isset($_POST['btSearch'])) {
    $txtSearch=$_POST['txtSearch'];
$getEntrees=$pdo->prepare("select * from entree where id_entree=? or quantite=? or pa_article=?");
$getEntrees->execute(array($txtSearch,$txtSearch,$txtSearch));
  }else if (isset($_POST['btDate'])) {
       $txtDate=$_POST['txtDate'];
$getEntrees=$pdo->prepare("select * from entree where date_entree LIKE ?");
$getEntrees->execute(array('%'.$txtDate.'%'));  
  }else{
    $getEntrees=$pdo->prepare("select * from entree");
if (isset($_POST['btNormal'])) {
$getEntrees=$pdo->prepare("select * from entree");
  }
if (isset($_POST['btAsc'])) {
//$getEntrees=$pdo->prepare("select * from entree order by nom_entree asc");
  }
if (isset($_POST['btDesc'])) {
//$getEntrees=$pdo->prepare("select * from entree order by nom_entree desc");
  }
  if (isset($_POST['btNew'])) {
$getEntrees=$pdo->prepare("select * from entree order by date_entree desc");
  }
if (isset($_POST['btOld'])) {
$getEntrees=$pdo->prepare("select * from entree order by date_entree asc");
  }
   if (isset($_POST['btPaid'])) {
$getEntrees=$pdo->prepare("select * from entree where etat='payé'");
  }
if (isset($_POST['btUnpaid'])) {
$getEntrees=$pdo->prepare("select * from entree where etat='non payé'");
  }
  
$getEntrees->execute();

  }
  $Entreesrow=$getEntrees->rowCount();
  if ($Entreesrow!=0) {
   $nom_articles[]=array();
   $qts_entree[]=array();
   $dates_entree[]=array();
   $obs_entree[]=array();
    $noms_type_src[]=array();
$noms_type_dest[]=array();
$pas_article[]=array();
$noms_source[]=array();
$noms_dest[]=array();
$pts_entree[]=array();
$etats[]=array();
$ids[]=array();
$index=0;
while ($Entrees=$getEntrees->fetch()) {

$id_article=$Entrees['id_article'];
$id_stock_src=$Entrees['id_type_stock_source'];
$id_stock_dest=$Entrees['id_type_stock_dest'];
$id_source=$Entrees['id_source'];
$id_destination=$Entrees['id_destination'];
$qts_entree[$index]=$Entrees['quantite'];
$dates_entree[$index]=$Entrees['date_entree'];
$obs_entree[$index]=$Entrees['description'];
$ids[$index]=$Entrees['id_entree'];
$etats[$index]=$Entrees['etat'];
$noms_articles[$index]=getArticlename($id_article,$pdo);
$noms_type_src[$index]=getTypeName($id_stock_src,$pdo);
$noms_type_dest[$index]=getTypeName($id_stock_dest,$pdo);
$pas_article[$index]=$Entrees['pa_article'];
$noms_source[$index]=getTypeName($id_stock_src,$pdo);
$noms_dest[$index]=getTypeName($id_stock_dest,$pdo);
$pts_entree[$index]=$pas_article[$index]*$qts_entree[$index];
if ($id_stock_src==2) {
$noms_source[$index]="S.CL-".getClientName($id_source,$pdo);
}
if ($id_stock_src==4) {
$noms_source[$index]="FSSR-".getFournisseurName($id_source,$pdo);
}
if ($id_stock_dest==2) {
$noms_dest[$index]="S.CL-".getClientName($id_destination,$pdo);
}
if ($id_stock_dest==4) {
$noms_dest[$index]="FSSR-".getFournisseurName($id_destination,$pdo);
}
$index=$index+1;
}
}



function getArticlename($id,$pdo) {
    $getValue=$pdo->prepare("select * from article where id_article=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
    $value="non disponible";
    if ($row>0) {
      $results=$getValue->fetch();
      $value= $results['nom_article'];
    }
    return $value;
}

function getTypeName($id,$pdo) {
     $getValue=$pdo->prepare("select * from type_stock where id_type=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
     $value="non disponible";
    if ($row>0) {
      $results=$getValue->fetch();
      $value= $results['nom'];
    }
    return $value;
}
function getFournisseurName($id,$pdo) {
   $getValue=$pdo->prepare("select * from fournisseur where id_fournisseur=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
    $value="non disponible";
    if ($row>0) {
      $results=$getValue->fetch();
      $value= $results['nom_fournisseur']." ".$results['prenom_fournisseur'];
    }
    return $value;
}
function getClientName($id,$pdo) {
   $getValue=$pdo->prepare("select * from client where id_client=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
    $value="non disponible";
    if ($row>0) {
      $results=$getValue->fetch();
      $value= $results['nom_client']." ".$results['prenom_client'];
    }
    return $value;
}

function getState($id,$pdo) {
   $getValue=$pdo->prepare("select * from entree where id_entree=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
    if ($row>0) {
      $results=$getValue->fetch();
      return $results['etat'];
    }
  
}
function getOldQuantiy($id,$pdo) {
   $getValue=$pdo->prepare("select * from entree where id_entree=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
    if ($row>0) {
      $results=$getValue->fetch();
      return $results['quantite'];
    }
  
}

//get stock types
 $getTypeNamesValues=$pdo->prepare("select * from type_stock");
    $getTypeNamesValues->execute();
    $NameRow=$getTypeNamesValues->rowCount();
    $typenames[]=array();
    $namesIds[]=array();
    $indexName=0;
    if ($NameRow>0) {
      while($results=$getTypeNamesValues->fetch()){
        $typenames[$indexName]=$results['nom'];
         $namesIds[$indexName]=$results['id_type'];
        $indexName++;
      }
     
    }

//get clients
 $getClientsNames=$pdo->prepare("select * from client");
    $getClientsNames->execute();
    $clientRow=$getClientsNames->rowCount();
    $clientsNames[]=array();
    $clientsIds[]=array();
    $indexClient=0;
    if ($clientRow>0) {
      while($results=$getClientsNames->fetch()){
        $clientsNames[$indexClient]=$results['nom_client']." ".$results['prenom_client'];
         $clientsIds[$indexClient]=$results['id_client'];
        $indexClient++;
      }
     
    }

//get fournisseurs
 $getFournisseurNames=$pdo->prepare("select * from fournisseur");
    $getFournisseurNames->execute();
    $frssrRow=$getFournisseurNames->rowCount();
    $frssrNames[]=array();
    $frssrIds[]=array();
    $indexFrssr=0;
    if ($frssrRow>0) {
      while($results=$getFournisseurNames->fetch()){
        $frssrNames[$indexFrssr]=$results['nom_fournisseur']." ".$results['prenom_fournisseur'];
         $frssrIds[$indexFrssr]=$results['id_fournisseur'];
        $indexFrssr++;
      }
     
    }

//get farticles
 $getArticles=$pdo->prepare("SELECT article.id_article as id, article.nom_article as nom FROM article");
    $getArticles->execute();
    $articlerow=$getArticles->rowCount();
    $articleNames[]=array();
    $articlesIds[]=array();
    $indexArt=0;
    if ($articlerow>0) {
      while($results=$getArticles->fetch()){

        if (isExist($results['id'],$pdo)==false) {
             $articleNames[$indexArt]=$results['nom'];
         $articlesIds[$indexArt]=$results['id'];
        $indexArt=$indexArt+1;
        }
       
      }
     
    }

function isExist($id,$pdo)
{
   $verifyArticle=$pdo->prepare("select id_article from entree where id_article=?");
    $verifyArticle->execute([$id]);
    $articlerow=$verifyArticle->rowCount();
    $value=false;
    $indexArt=0;
    if ($articlerow>0) {
        $value=true;
     
    } 

    return $value;
}


 



?>