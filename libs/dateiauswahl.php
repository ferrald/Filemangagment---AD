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
?>
