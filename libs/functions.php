<?php
function deletedb(){
  $sql = 'DROP TABLE Export1';
  $result = mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
}

function createdb(){
  $sql = 'CREATE DATABASE ADexport';
  $result = mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
}

function getusrlognam(){
  $sql = 'ALTER TABLE Export1
  ADD ID varchar(45)';
  $result = mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
  $sql = 'SELECT * FROM Export1';
  $result = mysql_query($sql);
  //$row;
  while($row=mysql_fetch_array($result)) {
        $reallogonname = $row["User Logon Name"];
        $id = preg_replace('/[^0-9]+/', '', $row["User Logon Name"]); //ersetzt alles durch    ausser zahlen
       //echo $row["User Logon Name"]."</br>";
       if(!empty($id)){
       $sql = "UPDATE Export1
            Set ID='".$id."' where `User Logon Name`= '".$reallogonname."'";
              echo $sql."</br>";
             $result = mysql_query($sql);}
             else{
               Echo "lol";
             }
      // print_r($row);
    /*   foreach ($row as $temprow) {
         $sql = "INSERT INTO Export1 (`ID`)
                VALUES('" .$temprow['User Logon Name']."')";
                echo $sql;
                $result = mysql_query($sql);
       }*/


  }
  //print_r($rows);
  //echo $rows[0]['User Logon Name'];
}

function cleanID(){

}

function endsWith($FullStr, $needle)
    {
        $StrLen = strlen($needle);
        $FullStrEnd = substr($FullStr, strlen($FullStr) - $StrLen);
        return $FullStrEnd == $needle;
    }

?>
