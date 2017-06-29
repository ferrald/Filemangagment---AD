<?php
function upload(){
  include("libs/inserttodb.php");
  move_uploaded_file($_FILES['datei']['tmp_name'], 'uploads/'.$_FILES['datei']['name']);
  insertADtoDB();
  header('Location: second.php'); //weiterleiten zur Kaschuso upload seite
  exit;
}
?>
