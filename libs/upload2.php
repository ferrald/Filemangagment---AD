<?php
function upload2(){
  move_uploaded_file($_FILES['datei']['tmp_name'], 'uploads/'.$_FILES['datei']['name']); //Die Vorher Ausgewählte datei hochlanden
  include("libs/inserttodb.php");
  insertKaschusotoDB(); //die Datei direkt in die MySqldatenbank importieren (lib/inserttodb)
  getschule();
  header('Location: funktionwahl.php'); //weiterleiten zur nächsten auswahlseite
  exit;
}
?>
