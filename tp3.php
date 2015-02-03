<?php
//toujours demarrer la gestion des sessions
  require_once("debut_auth.inc.php");
  ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"/>
  <link href="css.css" rel="stylesheet" type="text/css"/>
  <title>Travail pratique #3</title>


</head>
<body>
 
    <?php
 			 /*affichage de la date heure du jour */
 require_once "entete.inc";
  ?>
    <form id="personne" name="form" action='<?php echo $_SERVER["PHP_SELF"]?>' method="post">
 <?php
 			 /*affichage de la date heure du jour */
 require_once "erreur.inc";
  ?>

        <h2>Voici le contenu de la table Employe:</h2>
      <? echo" <p id='mode'>"."Bienvenu " .$_SESSION["nom"]."</p>";
      ?>
<table id="tab" border="1" width="70%" >
<thead>
<tr  style=" background-color: silver"><th>Identifiant</th><th>nom</th><th>adresse</th><th>salaire</th><th></th></tr>
</thead>
<tbody>
<?
$compt=0;
while ($ligne=$requeteID->fetch_assoc()) {
    $test= $ligne["empID"] ;

// Pour modifier les ligens ou les supprimer, on doit savoir quel. ligne supprimer ou modifier
// $test recupere la cle "empID"
  echo "<tr id='tr$test'>\n";
  echo "  <td name='$test' id='$test'  >", $ligne["empID"], "</td>\n";
  echo "  <td id='nom$test'>", $ligne["nom"], "</td>\n";
  echo "  <td id='adresse$test'>", $ligne["adresse"], "</td>\n";
  echo "  <td id='salaire$test'>", $ligne["salaire"], "</td>\n";
        $nom="supprime".$test;
        $modifier="modifier".$test;
        $clique="clique";
  echo "<td id='$modifier'><input type='submit' name='$nom' value='Supprimer' onclick='return suppresion()'/>
        <input type='submit' name='$modifier' value='Modifier'/>
       </td>";
 echo "</tr>\n";
 if($test>$compt)
 $compt=$test;

}


  /*affichage du insertion*/
  require_once "insertion.php";


  
$requeteID->close();
$db->close();

?>

</tbody>
</table>
         <input type="submit" name="insert" value="Insere Une Ligne" style="background-color: silver; margin-top: 10px"/>

  </form>


 <script type="text/javascript">
    function suppresion(){
    var resultat;
    resultat=confirm("�te vous sur de suppime la ligne Mrs <?php echo $_SESSION["nom"]; ?> si oui clik sur ok");
    if(resultat!="1")
        return false;


 else {
     document.forms["personne"].submit();
 }

    }


    </script>
 <?php
  /*affichage du supprime*/
  require_once "supprime.inc";
  ?>
<?php
  /*affichage de la modification*/
  require_once "modifier.inc";
  ?>


 <?php
  /*affichage de la formulare*/
  require_once "pied.inc";
  ?>

</body>
</html>
