<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titel</title>
  </head>
	<body>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="datei"><br>
		<input type="submit" value="Hochladen">
		</form>
<?php
	include("libs/functions.php");
?>

	</body>
</html>
