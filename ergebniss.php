</html>
<meta charset="UTF-8">
</body>
<h1>Nächste Funktion auswählen</h1>
<form action="ergebniss.php" method="post" enctype="multipart/form-data">
<select name="Option">
  <option value="Neueschüler">Neue Schüler</option>
  <option value="Austritte">Austritte</option>
  <option value="Neuohnemail">Neueintritte ohne Email</option>
<input type="submit" value="Auswählen">
</form>

<?php
include_once("libs/functions.php");
echo "<h2>Sie haben ".$_POST["Option"]." gewählt.</h2>";
$i = $_POST["Option"];

switch ($i) {
    case "Neueschüler":
        echo "i ist Neueschüler </br></br>";
        getusrlognam();
        getRightID();
        header('Location: ausgabeneuschueler.php'); //weiterleiten zur nächsten auswahlseite
        break;
    case "Austritte":
        echo "i ist Austritte";
        break;
    case "Neuohnemail":
        echo "i ist Neuohnemail";
        break;
}
?>
</body>
</html>
