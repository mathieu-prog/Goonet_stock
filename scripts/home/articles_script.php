<?php 

//for adding button

if (isset($_POST['btAdd'])) {
$nom=htmlentities($_POST['txtNom']);
$id=$_POST['btAdd'];


//modification
if ($_POST['btAdd']!=null) {
$modifyArticle=$pdo->prepare("update article set nom_article=? where id_article=?");
                            $modifyArticle->execute(array($nom,$id));
                            if ($modifyArticle) {
                                
                                $result="modifie avec succes!";
                            }else{
                                 $error="Erreur lors de la modification d'un article!";
                                }

}
//adding new article
else{
$getNom=$pdo->prepare("select * from article where nom_article=?");
        $getNom->execute(array($nom));
        $getRows=$getNom->rowCount();

        if ($getRows==0) {
     
          $insertArticle=$pdo->prepare("insert into article(nom_article) values(?)");
                            $insertArticle->execute(array($nom));
                            if ($insertArticle) {
                                
                                $result="Ajoute avec succes!";
                            }else{
                                 $error="Erreur lors de l'ajout d'un article!";
                                }

        }else{
            $error="L'article existe!";
        }
}
}

//end adding

//for deletting

if (isset($_POST['btDelete'])) {
    $id=$_POST['btDelete'];
    $deleteArticle=$pdo->prepare("delete from article where id_article=?");
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
$getArticles=$pdo->prepare("select * from article where nom_article LIKE ?");
$getArticles->execute(array('%'.$txtSearch.'%'));
  }else{
    $getArticles=$pdo->prepare("select * from article");
if (isset($_POST['btNormal'])) {
$getArticles=$pdo->prepare("select * from article");
  }
if (isset($_POST['btAsc'])) {
$getArticles=$pdo->prepare("select * from article order by nom_article asc");
  }
if (isset($_POST['btDesc'])) {
$getArticles=$pdo->prepare("select * from article order by nom_article desc");
  }
  
$getArticles->execute();

  }
  $articlerows=$getArticles->rowCount();
  if ($articlerows!=0) {
   $noms[]=array();
$pas[]=array();
$ids[]=array();
$index=0;
while ($articles=$getArticles->fetch()) {
$ids[$index]=$articles["id_article"];
$noms[$index]=$articles["nom_article"];
$index=$index+1;
}
  }



?>