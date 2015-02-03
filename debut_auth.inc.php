
<?php
//toujours demarrer la gestion des sessions
session_start();
//verifier si la variable login existe dans la session
if (!isset($_SESSION["login"])) {
  // on enregistre la page de retour pour revenir ici apr�s la page de login...
  $_SESSION["prog_retour"] = $_SERVER["PHP_SELF"];
  //redirection vers la page de login
  header("Location:login.php");
  exit;
}

?>