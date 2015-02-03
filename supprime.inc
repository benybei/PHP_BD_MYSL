<?php
/*la  fonction supprime d'une table de la basse de donne*/
$j=1;
$voir="supprime".$j;
while(!isset($_REQUEST[$voir])&& $j<=$compt)
  {
   $j++;
 $voir="supprime".$j;

}

// teste pour le j qui represente le id et le compt pour le plus grand id
if($j<=$compt){
      
function erreur_mysqlDelete($dbDelete, $req_sql) {
  echo "Erreur SQL " . $dbdbDelete->errno .  ": " . $dbdbDelete->error .
  " dans la requ&ecirc;te " . $req_sql;
  exit();
}

$dbDelete = new mysqli("mysql.iro.umontreal.ca","mtraore",'Zbh6za3L6Zt!g5',"mtraore_tp3");
if (mysqli_connect_errno()) {
   echo "Erreur de connexion a la BD: " . mysqli_connect_error();
   exit();
}
//la requete pour la suppression sur le ID
$sqlDelete = "DELETE FROM employes WHERE empID = $j";
$requeteID = $dbDelete->query($sqlDelete);
if ($dbDelete->errno) {
   erreur_mysqlDelete($dbDelete, $sqlDelete);
}
if ($dbDelete->affected_rows) {
    
  
 echo " <script type='text/javascript'>";

     echo "alert('La suppression  a fonctionne Vous avez supprime la Ligne NO '+$j);";
     echo " window.location.replace(\"http://www-desi.iro.umontreal.ca/~mtraore/TP3_PHP/tp3/tp3.php\")";

echo "</script>";
     

}
else {
   echo " <script type='text/javascript'>";
echo "alert('Aucune rangee affectee par la suppresion');";
echo "</script>";
}

}


?>