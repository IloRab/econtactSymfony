<?php 
	$no=htmlspecialchars($nom); 
	$nu=htmlspecialchars($num); 
?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>identification</title>
</head>

<body>

<h3> Formulaire d'authentification </h3> 

<form action="/identification" method="post">

    <input 	name="nom" 	type="text" 
			 value= "<?php echo($no); ?>" />       Nom      <br/>
			 
    <input  name="num"  type="text"
			 value= "<?php echo($nu) ?>" />       Matricule    <br/> 
			 
    <input type= "submit"  value="soumettre">
</form>

<div id ="m"> <?php echo $msg; ?> </div> 

</body></html>
