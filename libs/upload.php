<?php
function auswahldatei(){
  $dirPath = dir('uploads');
  while (($file = $dirPath->read()) !== false)
  {
    echo "<option value=\"" . trim($file) . "\">" . $file . "\n";
  }
  $dirPath->close();
  echo $file;
}

function upload(){
  move_uploaded_file($_FILES['datei']['tmp_name'], 'uploads/'.$_FILES['datei']['name']);
  header('Location: select.php');
  exit;
}
?>
