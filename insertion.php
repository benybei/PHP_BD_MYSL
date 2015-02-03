<?php
                    /* fonction INsertion d'une table a la basse de donnee*/

// teste pour le j qui represente le id et le compt pour le plus grand id
$j=$compt+1;
if(isset($_REQUEST["insert"])){
     echo " <script type='text/javascript'>";

    echo "document.getElementById('mode').innerHTML='vous alle INSERT la ligne NO $j a la Table ';";

echo "</script>";
// creation de la table a insert
     echo "<tr style='background-color:red'>";
     echo "<td name='$j' id='$j'><p type='text' id='$j'>$j</p></td>";
   echo "<td id='nom$j'><input type='text' id='valunom$j' name='nom$j' /></td>";
  echo " <td id='adresse$test'><input type='text' id='valunom$j' name='adresse$j'/></td>";
 echo "<td id='salaire$test'><input type='text' id='valunom$j' name='salaire$j' /></td>";
 echo " <td id='insert'><input type='submit' name='valide' value='Insert une ligne '/>
    <input type='submit' id='annule' name='annule' value=' Annule'/>
   </td>";
       echo "<tr>";
}

 /*  if (isset($_REQUEST["annule"])){
  echo " <script type='text/javascript'>";


echo "alert('Vous avez Annule Insertion de la Ligne');";
     echo " window.location.replace(\"http://www-desi.iro.umontreal.ca/~mtraore/TP3_PHP/tp3/tp3.php\")";


echo "</script>";
}
*/
// si il a clique pour valide la formulaireS
if(isset($_REQUEST["valide"]))
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
//la requete Mysqli pour faire Insertion de la tabble
$sql = "INSERT INTO employes  (empID, nom  ,  adresse, salaire ) " .
       "values ('$j', '$nom',  '$adresse','$salaire')";



$requeteID = $db->query($sql);
if ($db->errno) {
   erreur_mysql($db, $sql);
}
//echo "La suppression a fonctionne " . "Vous avez supprime le ID ".$j;
if ($db->affected_rows) {
    //header("Location: ./tp3.php" );

     echo " <script type='text/javascript'>";

     echo "alert('La Modification a fonctionne Vous avez INSERT  la Ligne NO '+$j);";
     echo " window.location.replace(\"http://www-desi.iro.umontreal.ca/~mtraore/TP3_PHP/tp3/tp3.php\")";

echo "</script>";

       //echo "La suppression a fonctionne " . "Vous avez supprime le ID ".$j;
} else {
   echo " <script type='text/javascript'>";
echo "alert('Aucune rangee affectee par INSERTION');";
echo "</script>";


}
 

}else{
      echo " <script type='text/javascript'>";
echo "alert('Erreur de saisi des donne le champs doit pas etre vide');";
echo "</script>";

 }
 }

?>
