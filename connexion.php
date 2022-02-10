<?php  include "header.php";?>
<?php

$conn = new mysqli('localhost', 'root', 'root');
if ($conn->connect_error)
  die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

  
require "SimpleOrm.class.php";
SimpleOrm::useConnection($conn, 'coursphp');
require "Utilisateur.php";
// $utilisateur = Utilisateur ::all();
// var_dump($utilisateur);
// $utilisateur = Utilisateur :: retrieveByPK(2);
// echo  $utilisateur ->email;


$nom=$_POST['nom'];

$pwd=$_POST['password'];

$entry = Utilisateur::retrieveByNom($_POST['nom'], SimpleOrm::FETCH_ONE);

// var_dump($entry);
if ($entry==null){
  die ("Stop : le nom entré n'est pas en base ... ! ");
}
$nom_bd=$entry->nom;
$pwd_bd = $entry->password;


if($nom == $nom_bd && $pwd==$pwd_bd){
     echo "vous etes connecter avec le nom ".$nom_bd;
     $_SESSION["user"]= $nom;
}else{
echo "vous n'etes pas connecter";
}


  ?>


<?php  include "footer.php";