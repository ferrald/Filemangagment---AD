<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titel</title>
    <?php
include("libs/dbconnect.php");
include("libs/functions.php");
?>
 </head>
    <body>
<form action="export.php" method="post" enctype="multipart/form-data">
<h3>Bitte wählen Sie den AD Export aus.</h3>
<select name="file">
  <option value="">- Select File -
    <?php
include("libs/upload.php");
auswahldatei();
?>
</select>
<input type="submit" value="Auswählen">
</form>

<?php
$link = dbconn();
deletedb();
//  echo $_POST["file"] . "</br>";
$dataname   = $_POST["file"];
$fieldnames = 1;
if (($handle = fopen("uploads/" . $dataname, "r")) !== FALSE) { //Datei mit entsprechend ausgewähltem dateinamen auswähläen
    while (($data = fgetcsv($handle, 0, ";")) !== FALSE) { //csv auslesen mit , trennung
        $num = count($data); //Datensätze zählen
        if ($fieldnames !== 0) {
            $fieldnames = 0;

            createdb();
            selectdb($link, 'Adexport');
            $sql = 'CREATE TABLE Export1' . '(';
            for ($c = 0; $c < $num; $c++) {
                $sql .= '`' . $data[$c] . '` varchar(150)';
                if ($c < $num - 1) {
                    $sql .= ', ';
                }

            } //sql-> Tabelle erstellen
            $sql .= ')';
            //  echo $sql . "</br>";
            $result = mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
        }

        else {
            $sql = 'INSERT INTO Export1 VALUES (';
            for ($c = 0; $c < $num; $c++) { //für jeden Datensat
                $sql .= '"' . $data[$c] . '"';
                if ($c < $num - 1) {
                    $sql .= ', ';
                }
                if ($c < 0) {
                    $sql .= ', ';
                } //den text ausgeben ($data = Array)
            }
            $sql .= ');';

            //  echo $sql;
            $result = mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
        }
    }
    //echo $data[1];
}
fclose($handle);
getusrlognam();
?>
</body>
</html>
