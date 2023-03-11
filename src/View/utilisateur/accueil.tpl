<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>accueil </title>
</head>

<body onunload="window.location.href='quitter.php'; ">

	<h2> Bienvenue
		<?php
		printf('M. %s', $nom);  //alternative structurée pour un echo de $nom
		?>
	</h2>

	<nav>
		<?php require("./View/menu.tpl"); ?>
	</nav> <!-- fin du menu nav -->

	<section id="contacts">
