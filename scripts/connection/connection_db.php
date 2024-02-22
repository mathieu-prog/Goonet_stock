<?php 

define('host', 'localhost');
	define('name', 'goonet_stock_db');
	define('username', 'root');
	define('password', '');
	try{
		$pdo= new PDO("mysql:host=".host."; dbname=".name, username,password);
		$pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		die('erreur:'.$e->getMessage());
	}
 ?>