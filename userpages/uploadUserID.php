<?php
session_start();

// Connection creation
include_once "../includes/db_connection.php";

// Grab kenteken
$reservering_id = $_SESSION['name'];

$id = $_SESSION['klant'];

$query = "UPDATE reservering SET klant_id = (?) WHERE reservering_id = '$reservering_id'";
$statement = $conn->prepare($query) or die("Error preparing");
$statement->bind_param('s',$id) or die('Error binding params');
$statement->execute() or die('Error executing');
$statement->close();

header('Location: reservation.php');
?>

