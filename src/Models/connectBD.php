<?php
$hostname = "localhost";
$base = "econtactSymfony";
$loginBD = "root";
$passBD = "";

try {

	$pdo = new PDO("mysql:server=$hostname; dbname=$base", "$loginBD", "$passBD");
	//die('OK connexion');
} catch (PDOException $e) {
	die("Echec de connexion : " . utf8_encode($e->getMessage()) . "\n");
}
