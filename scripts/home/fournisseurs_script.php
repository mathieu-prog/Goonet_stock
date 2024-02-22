<?php 

//for adding button

if (isset($_POST['btAdd'])) {
$nom=htmlentities($_POST['txtNom']);
$prenom=htmlentities($_POST['txtPrenom']);
$tel=htmlentities($_POST['txtTel']);
$adresse=htmlentities($_POST['txtAdresse']);
$societe=htmlentities($_POST['txtSociete']);
$id=$_POST['btAdd'];


//modification
if ($_POST['btAdd']!=null) {
$modify=$pdo->prepare("update fournisseur set nom_fournisseur=?,prenom_fournisseur=?,societe_fournisseur=?,tel_fournisseur=?,adresse_fournisseur=? where id_fournisseur=?");
                            $modify->execute(array($nom,$prenom,$societe,$tel,$adresse,$id));
                            if ($modify) {
                                
                                $result="modifie avec succes!";
                            }else{
                                 $error="Erreur lors de la modification d'un fournisseur!";
                                }

}
//adding new article
else{
$getNom=$pdo->prepare("select * from fournisseur where nom_fournisseur=? and prenom_fournisseur=? and societe_fournisseur=?");
        $getNom->execute(array($nom,$prenom,$societe));
        $getRows=$getNom->rowCount();

        if ($getRows==0) {
     
          $insert=$pdo->prepare("insert into fournisseur(nom_fournisseur,prenom_fournisseur,societe_fournisseur,tel_fournisseur,adresse_fournisseur) values(?,?,?,?,?)");
                            $insert->execute(array($nom,$prenom,$societe,$tel,$adresse));
                            if ($insert) {
                                
                                $result="Ajoute avec succes!";
                            }else{
                                 $error="Erreur lors de l'ajout d'un fournisseur!";
                                }

        }else{
            $error="Le fournisseur existe!";
        }
}
}

//end adding

//for deletting

if (isset($_POST['btDelete'])) {
    $id=$_POST['btDelete'];
    $deleteArticle=$pdo->prepare("delete from fournisseur where id_fournisseur=?");
                            $deleteArticle->execute(array($id));
                            if ($deleteArticle) {
                                
                                $result="supprimer avec succes!";
                            }else{
                                 $error="Erreur lors de la suppression d'un article!";
                                }
}

//for getting
if (isset($_POST['btSearch'])) {
    $txtSearch=htmlentities($_POST['txtSearch']);
$getFournisseurs=$pdo->prepare("select * from fournisseur where nom_fournisseur LIKE ? or prenom_fournisseur LIKE ?");
$getFournisseurs->execute(array('%'.$txtSearch.'%','%'.$txtSearch.'%'));
  }else{
    $getFournisseurs=$pdo->prepare("select * from fournisseur");
if (isset($_POST['btNormal'])) {
$getFournisseurs=$pdo->prepare("select * from fournisseur");
  }
if (isset($_POST['btAsc'])) {
$getFournisseurs=$pdo->prepare("select * from fournisseur order by nom_fournisseur asc");
  }
if (isset($_POST['btDesc'])) {
$getFournisseurs=$pdo->prepare("select * from fournisseur order by nom_fournisseur desc");
  }
  
$getFournisseurs->execute();

  }
  $fournisseursrow=$getFournisseurs->rowCount();
  if ($fournisseursrow!=0) {
   $noms[]=array();
   $prenoms[]=array();
   $societes[]=array();
   $adresses[]=array();
$telephones[]=array();
$ids[]=array();
$index=0;
while ($fournisseurs=$getFournisseurs->fetch()) {
$ids[$index]=$fournisseurs["id_fournisseur"];
$noms[$index]=$fournisseurs["nom_fournisseur"];
$prenoms[$index]=$fournisseurs["prenom_fournisseur"];
$societes[$index]=$fournisseurs["societe_fournisseur"];
$adresses[$index]=$fournisseurs["adresse_fournisseur"];
$telephones[$index]=$fournisseurs["tel_fournisseur"];
$index=$index+1;
}
  }



?>