<?php
function upload(){
  include_once("libs/inserttodb.php");
  move_uploaded_file($_FILES['datei']['tmp_name'], 'uploads/'.$_FILES['datei']['name']);
  insertADtoDB();
  header('Location: index.php'); //weiterleiten zur Kaschuso upload seite
  exit;
}
?>
