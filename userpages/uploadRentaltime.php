<?php
$ophaaldatum = $_POST['addOphaaldatum'];
$ophaaltijd = $_POST['addOphaaltijd'];
$retourdatum = $_POST['addRetourdatum'];
$retourtijd = $_POST['addRetourtijd'];

$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');
$query = "INSERT INTO reservering VALUES (0,?,?,?,?,?,?)";
$statement = $mysqli->prepare($query) or die("Error preparing");
$statement->bind_param('ssssss',$ophaaldatum, $ophaaltijd, $retourdatum, $retourtijd, $auto_id, $klant_id) or die('Error binding params');
$statement->execute() or die('Error executing');
$statement->close();

header('Location: carSelection.php');
?>

