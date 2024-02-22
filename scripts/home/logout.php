<?php 
require"scripts/connection/connection_db.php";
session_start();
$id=$_SESSION['id'];
$logout=$pdo->prepare("update user set state_user='offline' where id=?");
$logout->execute(array($id));
$_SESSION=array();
session_destroy();
header_remove();
header("Location:index.php");
 ?>