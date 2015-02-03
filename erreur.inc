<?
function erreur_mysql($db, $req_sql) {
  echo "Erreur SQL " . $db->errno .  ": " . $db->error .
  " dans la requ&ecirc;te " . $req_sql;
  exit();
}

$db = new mysqli("mysql.iro.umontreal.ca","mtraore",'Zbh6za3L6Zt!g5',"mtraore_tp3");
if (mysqli_connect_errno()) {
   echo "Erreur de connexion a la BD: " . mysqli_connect_error();
   exit();
}

$sql = "SELECT * FROM employes ORDER BY empID";
$requeteID = $db->query($sql);
if ($db->errno) {
   erreur_mysql($db, $sql);
}
?>
