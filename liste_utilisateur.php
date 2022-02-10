<?php include "header.php"; ?>
<?php

$conn = new mysqli('localhost', 'root', 'root');
if ($conn->connect_error)
  die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

  require "SimpleOrm.class.php";
SimpleOrm::useConnection($conn, 'coursphp');

require_once "Utilisateur.php";
$entry = Utilisateur::all();

foreach($entry as $monutilisateur){
    echo "<a href='unutilisateur.php?id=".$monutilisateur->id."'> $monutilisateur->prenom $monutilisateur->nom </a> Modifier - Supprimer <hr>";
}
    ?>
<?php include "footer.php"; ?>