<?php
function dbconn(){
  $link = mysql_connect('localhost', 'root' , '');
  if (!$link) { //Fehlermeldung fals connection nicht geht
    die('Not connected : ' . mysql_error());
  }
 return $link;
  // Datenbank auswählen
/*  */
}

function selectdb($link, $dbname){
  $db_selected = mysql_select_db($dbname, $link);
    if (!$db_selected) { //Fehlermeldung fals Datenbank nicht zugreifbar ist.
      die ('Can\'t use db : ' . mysql_error());
    }
}

?>
