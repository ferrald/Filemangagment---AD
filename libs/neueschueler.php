<?php
function neueschuelerabfrage(){
  include_once("libs/dbconnect.php");
  include_once("libs/csvspaltennamen.php");
  $link = dbconn();
  selectdb($link, 'Adexport');
  $sql    = "SELECT DISTINCT `export2`.`name` , `export2`.`vorname` , `export2`.`verg_ID` as verg_ID, id, regelklasse, telefon, mobile,emailadresse, benutzername FROM `export2` left JOIN `export1` ON `emailadresse` = `E-Mail Address` WHERE `benutzerstatus` = '1' AND `User Logon Name` IS NULL AND `regelklasse` LIKE '%17%'";
    $resu = mysql_query($sql);
    // output headers so that the file is downloaded rather than displayed
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=NeueschuelerExport.csv');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');
/*    $spaltnam = $spaltenname;
    foreach($spaltnam as $splnm){
      echo $splnm.";";
    }*/
    fputcsv($output,$spaltenname, ";");

    while ($row = mysql_fetch_array($resu))
    {
      //$row["benutzerstatus"]
      $line = array("","",$row["vorname"],"",$row["name"],$row["name"]." ".$row["vorname"],$row["name"]." ".$row["vorname"],$row['name'][0].$row['vorname'][0].$row['verg_ID'],"3edc","Schueler",$row["verg_ID"],$row["regelklasse"],preg_replace('/[^a-zA-Z]+/', '', $row["id"]),"Aarauerstrasse 30","","4600","Olten","","Schweiz","CH",$row["telefon"],"","","",$row["mobile"],"","","","","","","","",$row['emailadresse'],$row['name'][0].$row['vorname'][0].$row['verg_ID']."@bbzolten.ch","","www.bbzolten.so.ch","","","1","1","1","240","","","1","0","","","1","1","1","Users","G_netDomain","G_Win7Office16","Schueler","G_WLanBBZO",$row["regelklasse"],"","","","","","","","","","","","","","","","","","","","","","","","");
      fputcsv($output, $line, ";");
      }

    fclose($output);
}
?>
