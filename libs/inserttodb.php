<?php
function insertADtoDB(){
  include_once ("dbconnect.php");
  include_once ("functions.php");
  $link = dbconn();
  selectdb($link, 'Adexport');
  echo $_FILES['datei']['tmp_name'] . "</br>";
  $dataname   = $_FILES['datei']['name'];
  echo $dataname;

  $fieldnames = 1;
  ini_set("auto_detect_line_endings", true);
  if (($handle = fopen("uploads/" . $dataname, "r")) !== FALSE) { //Datei mit entsprechend ausgewähltem dateinamen auswähläen
    $sql    = 'DROP TABLE export1';
	  $result = mysql_query($sql);
    createdb();
    while (($data = fgetcsv($handle, 0, ";")) !== FALSE) { //csv auslesen mit ; trennung
        $num = count($data); //Datensätze zählen
        if ($fieldnames !== 0) {
            $fieldnames = 0;            
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
}
}

function insertKaschusotoDB($Teilschule){
  include_once ("dbconnect.php");
  include_once ("functions.php");
  $link = dbconn();
  echo $_FILES['datei']['tmp_name'] . "</br>";
  $dataname   = $_FILES['datei']['name'];
  echo $dataname;

  $fieldnames = 1;
  if (($handle = fopen("uploads/" . $dataname, "r")) !== FALSE) { //Datei mit entsprechend ausgewähltem dateinamen auswähläen
      while (($data = fgetcsv($handle, 0, ";")) !== FALSE) { //csv auslesen mit ; trennung
          $num = count($data); //Datensätze zählen
          for($c = 0; $c < $num - 1; $c++){
          if ($fieldnames !== 0) { //wird ausgeführt solange Fieldname nicht 0 ist
              $fieldnames = 0; //field name wird auf 0 gesetzt dass nur die Spaltennamen gezogen werden

              //createdb(); //db erstell funktion aufrufen
              selectdb($link, 'Adexport'); // DB Auswählen, wir geben die DB verbindung (funktion dbconn) und den 'Datenbank Namen' mit
              $sql = 'CREATE TABLE Export2' . '('; //Tabelle erstellen namens Export 2
              for ($c = 0; $c < $num - 1; $c++) { //Für jeden Datensatz wird der namen geschrieben
                  $sql .= '`' . $data[$c] . '` varchar(150)';
                  if ($c < $num - 2) { //Beim Letzten "Datensatz" das , wegnehmen
                      $sql .= ', ';
                  }

              }
              $sql .= ')';
              //echo $sql . "</br>";
              mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
          }

          else { //Alle Datensätze ausser die Spalten namen werden nun in die Tabelle eingefügt
              $sql = 'INSERT INTO Export2 VALUES (';
              for ($c = 0; $c < $num -1; $c++) { //für jeden Datensat
                  $sql .= '"' . $data[$c] . '"';
                  if ($c < $num - 2) {
                      $sql .= ', ';
                  }
                  if ($c < 0) {
                      $sql .= ', ';
                  } //den text ausgeben ($data = Array)
              }
              $sql .=  ');';
              //echo $sql;
              mysql_query($sql); //sql übergeben (Wichtig sonst funzt SQL nicht)
          }
        }
      }
fclose($handle);
  }

}

?>
