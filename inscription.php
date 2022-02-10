<?php "header.php" ?>

<?php

$conn = new mysqli('localhost', 'root', 'root');
if ($conn->connect_error)
  die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

  require "SimpleOrm.class.php";
SimpleOrm::useConnection($conn, 'coursphp');
require "Utilisateur.php";


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$pwd=$_POST['password'];
$email=$_POST['email'];
$age=$_POST['age'];


$entry = Utilisateur::retrieveByNom($_POST['nom'], SimpleOrm::FETCH_ONE);
$entry = Utilisateur::retrieveByNom($_POST['password'], SimpleOrm::FETCH_ONE);
  $entry = new Utilisateur;
  $entry ->nom = $nom;
  $entry ->prenom =$prenom;
  $entry ->password =$pwd;
  $entry ->email =$email;
  $entry ->age =$age;

  $entry ->save();
?>

    <?php "footer.php" ?>

