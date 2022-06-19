<?php
// Database connectie
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

// Grab kenteken
$id = $_GET['id'];
$reservering_id = $_GET['reservering_id'];

$query = "UPDATE reservering SET auto_id = (?) WHERE reservering_id = '$reservering_id'";
$statement = $mysqli->prepare($query) or die("Error preparing");
$statement->bind_param('s',$id) or die('Error binding params');
$statement->execute() or die('Error executing');
$statement->close();

header('Location: carRental.php');
?>

