<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titel</title>
    <?php
    include ("libs/dbconnect.php");
    $link = dbconn();
    selectdb($link, "ADexport");
    ?>
  </head>

	<body>
    <h2>Bitte Wählen Sie den Upload für den Active Directory Export</h2>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="datei"><br>
		<input type="submit" value="Hochladen">
		</form>
  </br></br>
    <h2>Bitte Wählen Sie den Upload für den Kaschuso Export für GIBS</h2>
    <form action="upload2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="datei"><br>
    <input type="submit" value="Hochladen">
    <?php
    include 'libs/teilschulabfrage.php';
    $Teilschule = "gibsol";
    teilschulabfrage($Teilschule);
    ?>
    </form>
    <h2>Bitte Wählen Sie den Upload für den Kaschuso Export für KBS</h2>
    <form action="upload2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="datei"><br>
    <input type="submit" value="Hochladen">
    <?php
    $Teilschule = "kbsol";
    teilschulabfrage($Teilschule);
    ?>
    </form>
    <h2>Bitte Wählen Sie den Upload für den Kaschuso Export für EBZ</h2>
    <form action="upload2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="datei"><br>
    <input type="submit" value="Hochladen">
    <?php
    $Teilschule = "EBZ";
    teilschulabfrage($Teilschule);
    ?>
    </form>
    <h2>Bitte Wählen Sie den Upload für den Kaschuso Export für BZGS GB</h2>
    <form action="upload2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="datei"><br>
    <input type="submit" value="Hochladen">
    <?php
    $Teilschule = "BZGS";
    teilschulabfrage($Teilschule);
    ?>
    </form>
    <h2>Bitte Wählen Sie den Upload für den Kaschuso Export für BZGS HF</h2>
    <form action="upload2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="datei"><br>
    <input type="submit" value="Hochladen">
    <?php
    $Teilschule = "ddddd";
    teilschulabfrage($Teilschule);
    ?>
    </form>
    <form action="funktionwahl.php" mehtod="post" enctype="multipart/form-data">
      <input type="submit" value="Weiter">
    </form>
	</body>
</html>
