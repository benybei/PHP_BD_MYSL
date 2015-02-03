<?php
/* fonction modification pour Modifier la ligne d'une table de la basse de donne*/

// teste pour le j qui represente le id et le compt pour le plus grand id
$j=1;
$voir="modifier".$j;
while(!isset($_REQUEST[$voir])&& $j<=$compt)
  {
   

   $j++;
 $voir="modifier".$j;

}


                /* la creation de la table avant la comfirmation*/
if( $j<=$compt && !isset($_REQUEST["clique"])){
    

    echo"<script type='text/javascript'>";
//echo "document.getElementById('mode').bgColor='red';";
echo "document.getElementById('mode').innerHTML='vous alle Modifier une table la ligne NO $j ';";

     echo"document.getElementById('tr$j').bgColor='red';";
    echo"var nom=document.getElementById('nom$j');";
   echo " var valeur=nom.innerHTML;";

   echo"nom.innerHTML=\"<input type='text' id='valunom$j' name='nom$j' />\";";
 echo"document.getElementById('valunom$j').value=valeur;";

    echo"var adresse=document.getElementById('adresse$j');";
    echo " var valeur=adresse.innerHTML;";
   //echo"document.writeln(\"<input type='text'/>\");";
   echo"adresse.innerHTML=\"<input type='text' name='adresse$j' id='valuadres$j'/>\";";
 echo"document.getElementById('valuadres$j').value=valeur;";
  
    echo"var salaire=document.getElementById('salaire$j');";
      echo " var valeur=salaire.innerHTML;";
  // echo"document.writeln(\"<input type='text'/>\");";
   echo"salaire.innerHTML=\"<input type='text' name='salaire$j' id='valusal$j' />\";";
 echo"document.getElementById('valusal$j').value=valeur;";
    echo"var modif=document.getElementById('modifier$j');";
  // echo"document.writeln(\"<input type='text'/>\");";
    
   echo"modif.innerHTML=\"<input type='submit' name='clique$j' value='Modifier la ligne'/><input type='submit' id='annule' name='annule' value=' Annule'/>\";";
//echo"document.writeln(\"<input type='submit' id='annule' name='annule' value=' Annule'/>\");";
//echo"document.getElementById('cache').value=$j;";

echo "</script>";

}

$j=1;
$voir="clique".$j;
while(!isset($_REQUEST[$voir])&& $j<=$compt)
{       $j++;
 $voir="clique".$j;
}

if (isset($_REQUEST["annule"])){
  echo " <script type='text/javascript'>";

    
//echo "alert('Vous avez Annule La Modification');";
     echo " window.location.replace(\"http://www-desi.iro.umontreal.ca/~mtraore/TP3_PHP/tp3/tp3.php\")";


echo "</script>";
}
if (isset($_REQUEST[$voir])&& $j<=$compt)
 {
$nom_test="nom".$j;
$adresse_test="adresse".$j;
$salaire_test="salaire".$j;

$nom=$_REQUEST[$nom_test];
$adresse=$_REQUEST[$adresse_test];
$salaire=$_REQUEST[$salaire_test];
  if($nom!="" && $adresse!="" && $salaire!="" && $salaire>0 ){

  
$db = new mysqli("mysql.iro.umontreal.ca","mtraore",'Zbh6za3L6Zt!g5',"mtraore_tp3");
if (mysqli_connect_errno()) {
   echo "Erreur de connexion a la BD: " . mysqli_connect_error();
   exit();
}

            /* la requete Misqli pour la Modification de la ligne*/
$sql = "UPDATE  employes SET nom = '$nom', adresse='$adresse',
salaire='$salaire' WHERE empID ='$j' ";

$requeteID = $db->query($sql);
if ($db->errno) {
   erreur_mysql($db, $sql);
}
//echo "La suppression a fonctionne " . "Vous avez supprime le ID ".$j;
if ($db->affected_rows) {
    //header("Location: ./tp3.php" );
    
     echo " <script type='text/javascript'>";
     
     echo "alert('La Modification a fonctionne Vous avez Modifier la Ligne NO '+$j);";
     
     echo " window.location.replace(\"http://www-desi.iro.umontreal.ca/~mtraore/TP3_PHP/tp3/tp3.php\")";
     

echo "</script>";
     
       //echo "La suppression a fonctionne " . "Vous avez supprime le ID ".$j;
} else {
   echo " <script type='text/javascript'>";
echo "alert('Aucune rangee affectee par la MODIFICATION');";
echo "</script>";

 
}
  //header("Location: ./tp3.php" );

}else{
      echo " <script type='text/javascript'>";
echo "alert('Erreur de saisi des donne le champs doit pas etre vide');";
echo "</script>";

 }
 }
 
?>
