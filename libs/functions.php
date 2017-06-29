<?php
function deletedb()
{
    $sql    = 'DROP TABLE Export1';
    $result = mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
}

function createdb()
{
    $sql    = 'CREATE DATABASE ADexport';
    $result = mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
}

function getusrlognam()
{
    include ("dbconnect.php");
    $link = dbconn();
    selectdb($link, "ADexport");

    $sql    = 'ALTER TABLE Export1 ADD verg_ID varchar(45)';
    mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
    $sql    = 'SELECT * FROM Export1';
    $res = mysql_query($sql);
    //echo $res;
    while ($row = mysql_fetch_array($res)) {
        $reallogonname = $row["User Logon Name"];
        $id            = preg_replace('/[^0-9]+/', '', $row["User Logon Name"]); //ersetzt alles durch    ausser zahlen
        //echo $reallogonname." ";
        if (!empty($id)) {
            $sql = "UPDATE Export1
            Set verg_ID='" . $id . "' where `User Logon Name`= '" . $reallogonname . "'";
            //echo $sql . "</br>";
            mysql_query($sql);
        } else {
            //Echo "lol </br>";
        }
    }
}

function getRightID()
{
    $link = dbconn();
    selectdb($link, "ADexport");

    $sql    = 'ALTER TABLE Export2 ADD verg_ID varchar(45)';
    mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
    $sql    = 'SELECT * FROM Export2';
    $res = mysql_query($sql);
    //echo $res;
    while ($row = mysql_fetch_array($res)) {
        $realid = $row["id"];
        $var_id            = preg_replace('/[^0-9]+/', '', $row["id"]); //ersetzt alles durch    ausser zahlen
      //  echo $realid." ";
        if (!empty($var_id )) {
            $sql = "UPDATE Export2
            Set verg_ID='" . $var_id  . "' where `id`= '" . $realid . "'";
            //echo $sql . "</br>";
            mysql_query($sql);
        } else {
          //  Echo "lol </br>";
        }
    }
}
?>
