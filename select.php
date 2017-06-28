<!DOCTYPE html>
<html lang="de">
  <head>
    <?php
    include("libs/upload.php");
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titel</title>
  </head>

	<body>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="datei"><br>
		<input type="submit" value="Hochladen">
		</form>

<form action="export.php" method="post" enctype="multipart/form-data">
<h3>Bitte wählen Sie den AD Export aus.</h3>
<select name="File">
  <option value="">- Select File -
    <?php
      select();
    ?>

</select>
<h3>Bitte wählen Sie den Kaschuso Export aus.</h3>
<select name="file">
  <option value="">- Select File -
    <?php
    select();
    ?>
</select>
</br></br>
<h4>Funktion auswählen</h4>
<select name="Option">
  <form action="export.php" method="post" enctype="multipart/form-data">
  <option value="Neueschüler">Neue Schüler</option>
  <option value="Austritte">Austritte</option>
  <option value="Neuohnemail">Neueintritte ohne Email</option>
<input type="submit" value="Auswählen">
</form>
</body>
</html>
