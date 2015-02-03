<?php
//toujours demarrer la gestion des sessions
session_start();

  require_once("DBuser.class.inc");

  if (array_key_exists("userLogin", $_REQUEST)) {
     $user = $_REQUEST['userLogin'];
     $mp = $_REQUEST["userPwd"];
     if (($erreurs = validerFormulaire($user, $mp)) !== true) {
        afficherFormulaire($erreurs, $user, $mp);
     }
  } else {
     afficherFormulaire();
  }

  /*la validation de la formulaire avec la creation de la session*/
  function validerFormulaire($user, $mp) {
     $uid = new DB_usager($user);
     if ($uid->existe()) {
       if ($uid->get_psw() == $mp) {
          $_SESSION["login"] = $uid->get_userid();
          $_SESSION["priv"] = $uid->get_priv();
           $_SESSION["nom"] = $uid->get_nom();
          //header("Location: {$_SESSION["prog_retour"]}");
           header("Location: ./tp3.php");
          exit;
       } else {
          return "Erreur mot de passe invalide Veuillez Recommence SVP";
       }
     } else {
       return "Erreur l'usager n'existe pas Veuillez recommence SVP";
     }
     return true;
  }
                /* afficahge de la formulaire*/
  function afficherFormulaire( $msg="", $login="", $pwd="" ) {
     $prog = $_SERVER["PHP_SELF"];
     echo <<< _FIN_
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"/>
  <link href="css.css" rel="stylesheet" type="text/css"/>
  <title>Travail pratique #3</title>


</head>
<body>
<h1>Veuillez vous Identifier SVP</h1>

<hr style=" margin-left:30%;margin-right: 25%;margin-bottom:20px;"/>

  <p class="erreur">$msg</p>

    <form action="$prog" method="post" style=" margin:15%">
     
      <p style="padding-left:45px"> Login: <input type="text" name="userLogin" value="$login"/></p>
      <p> Mot de passe: <input type="password" name="userPwd" value="$pwd"/></p>
      <input type="submit" value="Valider" style="margin-left:80px;  background-color: silver"/>
     
          
  
    </form>
     <hr/>
<p> Travail fait par:mahamadou traore</p>
<table class="bas" width="100%">
	<tr>
<td class="gauche"><span>
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-xhtml10"
        alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
        </span>
</td>

<td class="droite"><span>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="CSS Valide !" />
    </a>
</span>
     </td>
</tr>

</table>

  </body>
</html>
_FIN_;
  }


?>
