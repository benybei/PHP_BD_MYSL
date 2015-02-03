<?php

Class DB_usager {

  var $userid;
  var $nom;
  var $psw;
  var $priv;
  var $existe;


  function DB_usager($userid="", $mp="") {
    $this->connexion();
    if ($userid != "") {
      $this->get_fiche($userid);
    } else {
      $this->existe = false;
    }
  }

  function write_DB() {
     if ($this->existe) {
       echo "DB update<br>";
       echo "UPDATE usagers set userid='{$this->userid}', nom='{$this->nom}',".
          "psw='{$this->psw}', priv='{$this->priv}' WHERE userid='{$this->userid}'";
     } else {
       echo "DB insert<br>";
       echo "Insert into usagers (userid, nom, psw, priv) VALUES ('$this->userid'," .
          "'$this->nom', '$this->psw', '$this->priv')";
       $this->existe = true;
     }
  }

  function delete_DB() {
     if ($this->existe) {
       echo "DB delete<br>";
       echo "DELETE from usagers WHERE userid='{$this->userid}'";
       $this->existe = false;
     }
  }

  function existe() {
    return $this->existe;
  }

  function get_userid() {
    return $this->userid;
  }

  function get_nom() {
    return $this->nom;
  }

  function get_psw() {
    return $this->psw;
  }

  function get_priv() {
    return $this->priv;
  }

  function set_userid($newUserid) {
    $this->get_fiche($newUserid);
  }

  function set_nom($newNom) {
    $this->nom = $newNom;
  }

  function set_psw($newPsw) {
    $this->psw = $newPsw;
  }

  function set_priv($newPriv) {
    $this->priv = $newPriv;
  }

  function toHTML() {
    $msg = "<b>Userid:</b><i>{$this->userid}</i><br>\n";
    $msg .= "<b>Nom:</b><i>{$this->nom}</i><br>\n";
    $msg .= "<b>Mot de passe:</b><i>{$this->psw}</i><br>\n";
    $msg .= "<b>Privilege:</b><i>{$this->priv}</i><br>\n";
    $msg .= "<b>existe:</b><i>".($this->existe?"existe":"existe pas")."</i><br>\n";
    return $msg;
  }

  function get_fiche($userid) {
     $this->userid = $userid;
    
     $sql = "SELECT nom, motPasse, login FROM usagers WHERE login='$userid'";
     $requeteID = mysql_query($sql) or
       die("Erreur SQL " . mysql_errno() . ": " . mysql_error() .
       " dans la requ&ecirc;te " . $sql);
     list($this->nom, $this->psw, $this->priv) = mysql_fetch_row($requeteID);
     if ($this->nom == "") {
       $this->existe = false;
     } else {
       $this->existe = true;
     }
  }

  function connexion() {
     mysql_connect('mysql.iro.umontreal.ca','mtraore','Zbh6za3L6Zt!g5');
     mysql_select_db("mtraore_tp3");
  }

  function deconnexion() {
     mysql_close();

  }


}

?>
