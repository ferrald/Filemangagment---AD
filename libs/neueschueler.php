<?php
function neueschuelerabfrage(){
  $sql    = 'SELECT * FROM Export1';
  mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
  echo $sql;

}
?>
