<?php 

//for adding button

if (isset($_POST['btAddEntry'])) {
    $id=$_POST['comboOldQte'];
$oldqte=getOldQuantiy($id,$pdo);
$idTypeStockProv=getTypeSrc($id,$pdo);
$idTypeStockDest=$_POST['comboDest'];
$idArticle=getArticleId($_POST['comboArticle'],$pdo);
$qte=$_POST['txtQte'];

if (isset($_POST['checkPyt'])) {
    $pyt="payé";
}
$idProv=null;
$idDest=null;
$obs=htmlentities($_POST['txtObs']);
if ($idTypeStockProv==2) {
    $idProv=getClientId($id,$pdo);
}

if ($idTypeStockProv==4) {
    $idProv=getFournisseurId($id,$pdo);
}
if ($idTypeStockDest==2) {
    $idDest=$_POST['comboClientsDest'];
}

if ($idTypeStockDest==4) {
    $idDest=$_POST['comboFournisseursDest'];
}

     
          $insert=$pdo->prepare("insert into sorties(id_article,id_type_stock_source,id_type_stock_dest, quantite,id_source,id_destination,description) values(?,?,?,?,?,?,?)");
                            $insert->execute(array($idArticle,$idTypeStockProv,$idTypeStockDest,$qte,$idProv,$idDest,$obs));
                            if ($insert) {
                                $newqte=$oldqte-$qte;
                                  $update=$pdo->prepare("update entree set quantite=? where id_entree=?");
                            $update->execute(array($newqte,$id));
                                $result="Ajoute avec succes!";
                            }else{
                                 $error="Erreur lors de l'ajout d'un sorties!";
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
    $modifyState=$pdo->prepare("update sorties set etat=? where id_sortie=?");
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
    $restock=$pdo->prepare("update sorties set quantite=?,pa_article=?, description=? where id_sortie=?");
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
$getsortiess=$pdo->prepare("select * from sorties where id_sortie=? or quantite=? or pa_article=?");
$getsortiess->execute(array($txtSearch,$txtSearch,$txtSearch));
  }else if (isset($_POST['btDate'])) {
       $txtDate=$_POST['txtDate'];
$getsortiess=$pdo->prepare("select * from sorties where date_sorties LIKE ?");
$getsortiess->execute(array('%'.$txtDate.'%'));  
  }else{
    $getsortiess=$pdo->prepare("select * from sorties");
if (isset($_POST['btNormal'])) {
$getsortiess=$pdo->prepare("select * from sorties");
  }
if (isset($_POST['btAsc'])) {
//$getsortiess=$pdo->prepare("select * from sorties order by nom_sorties asc");
  }
if (isset($_POST['btDesc'])) {
//$getsortiess=$pdo->prepare("select * from sorties order by nom_sorties desc");
  }
  if (isset($_POST['btNew'])) {
$getsortiess=$pdo->prepare("select * from sorties order by date_sorties desc");
  }
if (isset($_POST['btOld'])) {
$getsortiess=$pdo->prepare("select * from sorties order by date_sorties asc");
  }
   if (isset($_POST['btPaid'])) {
$getsortiess=$pdo->prepare("select * from sorties where etat='payé'");
  }
if (isset($_POST['btUnpaid'])) {
$getsortiess=$pdo->prepare("select * from sorties where etat='non payé'");
  }
  
$getsortiess->execute();

  }
  $sortiessrow=$getsortiess->rowCount();
  if ($sortiessrow!=0) {
   $nom_articles[]=array();
   $qts_sorties[]=array();
   $dates_sorties[]=array();
   $obs_sorties[]=array();
    $noms_type_src[]=array();
$noms_type_dest[]=array();
$pas_article[]=array();
$noms_source[]=array();
$noms_dest[]=array();
$pts_sorties[]=array();
$etats[]=array();
$ids[]=array();
$index=0;
while ($sortiess=$getsortiess->fetch()) {

$id_article=$sortiess['id_article'];
$id_stock_src=$sortiess['id_type_stock_source'];
$id_stock_dest=$sortiess['id_type_stock_dest'];
$id_source=$sortiess['id_source'];
$id_destination=$sortiess['id_destination'];
$qts_sorties[$index]=$sortiess['quantite'];
$dates_sorties[$index]=$sortiess['date_sortie'];
$obs_sorties[$index]=$sortiess['description'];
$ids[$index]=$sortiess['id_sortie'];
$noms_articles[$index]=getArticlename($id_article,$pdo);
$noms_type_src[$index]=getTypeName($id_stock_src,$pdo);
$noms_type_dest[$index]=getTypeName($id_stock_dest,$pdo);
$noms_source[$index]=getTypeName($id_stock_src,$pdo);
$noms_dest[$index]=getTypeName($id_stock_dest,$pdo);
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
function getTypeSrc($id,$pdo) {
     $getValue=$pdo->prepare("select * from entree where id_entree=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
     $value="non disponible";
    if ($row>0) {
      $results=$getValue->fetch();
      $value= $results['id_type_stock_dest'];
    }
    return $value;
}
function getClientId($id,$pdo) {
     $getValue=$pdo->prepare("select * from entree where id_entree=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
     $value="non disponible";
    if ($row>0) {
      $results=$getValue->fetch();
      $value= $results['id_destination'];
    }
    return $value;
}
function getFournisseurId($id,$pdo) {
     $getValue=$pdo->prepare("select * from entree where id_entree=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
     $value="non disponible";
    if ($row>0) {
      $results=$getValue->fetch();
      $value= $results['id_destination'];
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


function getOldQuantiy($id,$pdo) {
   $getValue=$pdo->prepare("select * from entree where id_entree=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
    if ($row>0) {
      $results=$getValue->fetch();
      return $results['quantite'];
    }
  
}
function getArticleId($id,$pdo) {
   $getValue=$pdo->prepare("select * from entree where id_entree=?");
    $getValue->execute(array($id));
    $row=$getValue->rowCount();
    if ($row>0) {
      $results=$getValue->fetch();
      return $results['id_article'];
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

//get articles
 $getArticles=$pdo->prepare("SELECT article.id_article as id,entree.id_entree as idEntree, article.nom_article as nom FROM article join entree on entree.id_article=article.id_article");
    $getArticles->execute();
    $articlerow=$getArticles->rowCount();
    $articleNames[]=array();
    $articlesIds[]=array();
    $indexArt=0;
    if ($articlerow>0) {
      while($results=$getArticles->fetch()){

        if (isExist($results['id'],$pdo)==true) {
            if ($results['nom']==null) {
                   $articleNames[$indexArt]="non disponible";
            }else{

             $articleNames[$indexArt]=$results['nom'];
            }
         $articlesIds[$indexArt]=$results['idEntree'];
        $indexArt=$indexArt+1;
        }
       
      }
     
    }

    //get quantites
 $getQuantities=$pdo->prepare("SELECT * FROM entree");
    $getQuantities->execute();
    $qtrow=$getQuantities->rowCount();
    $qteValues[]=array();
    $qteIds[]=array();
    $indexArt=0;
    if ($qtrow>0) {
      while($results=$getQuantities->fetch()){

        $qteValues[$indexArt]=$results['quantite'];
         $qteIds[$indexArt]=$results['id_entree'];
        $indexArt=$indexArt+1;
       
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