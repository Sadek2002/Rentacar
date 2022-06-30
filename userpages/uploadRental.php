<?php
$ophaaldatum = "2022/02/20";
$ophaaltijd = "12:00";
$retourdatum = "2022/02/20";
$retourtijd = "12:00";
$auto_id = $_POST['kenteken'];
$klant_id = "2";

// Connection creation
include_once "../includes/db_connection.php";

$query = "INSERT INTO reservering VALUES (0,?,?,?,?,?,?)";
$statement = $conn->prepare($query) or die("Error preparing");
$statement->bind_param('ssssss',$ophaaldatum, $ophaaltijd, $retourdatum ,$retourtijd, $auto_id, $klant_id) or die('Error binding params');
$statement->execute() or die('Error executing');
$statement->close();

header('Location: reservation.php');
?>

