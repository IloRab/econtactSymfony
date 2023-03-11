<?php
function db_query_contacts($idU)
{
  require("./Models/connectBD.php");
  $sql = "SELECT nom, prenom, email from contact c, utilisateur u where c.id_nom = :id and c.id_contact = u.id_nom limit 0,30";

  try {
    $commande = $pdo->prepare($sql);
    $commande->bindParam(':id', $idU);
    $bool = $commande->execute();
  } catch (PDOException $e) {
    echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die("STOP Catch Verif"); // On arrête tout.
  }


  if ($bool)
    return $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
}
