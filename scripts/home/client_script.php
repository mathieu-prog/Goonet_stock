<?php 

//for adding button

if (isset($_POST['btAdd'])) {
$nom=htmlentities($_POST['txtNom']);
$prenom=htmlentities($_POST['txtPrenom']);
$tel=htmlentities($_POST['txtTel']);
$adresse=htmlentities($_POST['txtAdresse']);
$societe=htmlentities($_POST['txtSociete']);
$bp=$_POST['txtBP'];
$id=$_POST['btAdd'];


//modification
if ($_POST['btAdd']!=null) {
$modify=$pdo->prepare("update client set nom_client=?,prenom_client=?,societe_client=?,tel_client=?,adresse_client=?,bp_client=? where id_client=?");
                            $modify->execute(array($nom,$prenom,$societe,$tel,$adresse,$bp,$id));
                            if ($modify) {
                                
                                $result="modifie avec succes!";
                            }else{
                                 $error="Erreur lors de la modification d'un client!";
                                }

}
//adding new article
else{
$getNom=$pdo->prepare("select * from client where nom_client=? and prenom_client=? and societe_client=?");
        $getNom->execute(array($nom,$prenom,$societe));
        $getRows=$getNom->rowCount();

        if ($getRows==0) {
     
          $insert=$pdo->prepare("insert into client(nom_client,prenom_client,societe_client,tel_client,adresse_client,bp_client) values(?,?,?,?,?,?)");
                            $insert->execute(array($nom,$prenom,$societe,$tel,$adresse,$bp));
                            if ($insert) {
                                
                                $result="Ajoute avec succes!";
                            }else{
                                 $error="Erreur lors de l'ajout d'un client!";
                                }

        }else{
            $error="Le client existe!";
        }
}
}

//end adding

//for deletting

if (isset($_POST['btDelete'])) {
    $id=$_POST['btDelete'];
    $deleteClient=$pdo->prepare("delete from client where id_client=?");
                            $deleteClient->execute(array($id));
                            if ($deleteClient) {
                                
                                $result="supprimer avec succes!";
                            }else{
                                 $error="Erreur lors de la suppression d'un client!";
                                }
}

//for getting
if (isset($_POST['btSearch'])) {
    $txtSearch=htmlentities($_POST['txtSearch']);
$getClients=$pdo->prepare("select * from client where nom_client LIKE ? or prenom_client LIKE ?");
$getClients->execute(array('%'.$txtSearch.'%','%'.$txtSearch.'%'));
  }else{
    $getClients=$pdo->prepare("select * from client");
if (isset($_POST['btNormal'])) {
$getClients=$pdo->prepare("select * from client");
  }
if (isset($_POST['btAsc'])) {
$getClients=$pdo->prepare("select * from client order by nom_client asc");
  }
if (isset($_POST['btDesc'])) {
$getClients=$pdo->prepare("select * from client order by nom_client desc");
  }
  
$getClients->execute();

  }
  $clientsrow=$getClients->rowCount();
  if ($clientsrow!=0) {
   $noms[]=array();
   $prenoms[]=array();
   $societes[]=array();
   $adresses[]=array();
    $bps[]=array();
$telephones[]=array();
$ids[]=array();
$index=0;
while ($clients=$getClients->fetch()) {
$ids[$index]=$clients["id_client"];
$noms[$index]=$clients["nom_client"];
$prenoms[$index]=$clients["prenom_client"];
$societes[$index]=$clients["societe_client"];
$bps[$index]=$clients["bp_client"];
$adresses[$index]=$clients["adresse_client"];
$telephones[$index]=$clients["tel_client"];
$index=$index+1;
}
  }



?>