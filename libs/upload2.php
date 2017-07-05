<?php
function upload2(){
  move_uploaded_file($_FILES['datei']['tmp_name'], 'uploads/'.$_FILES['datei']['name']); //Die Vorher Ausgewählte datei hochlanden
  include_once("libs/inserttodb.php");
  include_once("libs/functions.php");
  include_once("libs/dbconnect.php");
  $link = dbconn();
  selectdb($link, 'Adexport');
  $ts = $_POST["Teilschule"];
  delteilschul($ts);
  insertKaschusotoDB($ts); //die Datei direkt in die MySqldatenbank importieren (lib/inserttodb)
  //getschule();
  header('Location: index.php'); //weiterleiten zur nächsten auswahlseite
  exit;
}
?>
