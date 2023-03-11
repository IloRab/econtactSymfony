<?php
function verif_ident($nom, $num, &$profil = array())
{
  require("./Models/connectBD.php");
  $sql = "SELECT * FROM `utilisateur` where nom=:nom and num=:num";

  try {
    $commande = $pdo->prepare($sql);
    $commande->bindParam(':nom', $nom);
    $commande->bindParam(':num', $num);
    $bool = $commande->execute();
  } catch (PDOException $e) {
    echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die("STOP Catch Verif");
  }


  if ($bool)
    $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);

  if (count($resultat) == 0) return false;
  else {
    $profil = $resultat[0];
    return true;
  }
}
