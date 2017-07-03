<?php
function neueschuelerabfrage(){
  include("libs/dbconnect.php");
  $link = dbconn();
  selectdb($link, 'Adexport');
  $sql    = "SELECT * FROM Export2 WHERE NOT EXISTS(SELECT NULL FROM Export1 WHERE Export1.verg_id = Export2.verg_id)AND Export2.benutzerstatus = 'Ja'";
  //
//$sql    = "SELECT * FROM Export2 WHERE NOT EXISTS(SELECT NULL FROM Export1 WHERE Export1.verg_id = Export2.verg_id)"
    $resu = mysql_query($sql);
    // output headers so that the file is downloaded rather than displayed
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=NeueschuelerExport.csv');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    while ($row = mysql_fetch_array($resu))
    {
      $line = array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11]);
      fputcsv($output, $line, ";");
      }

    fclose($output);
}
?>
