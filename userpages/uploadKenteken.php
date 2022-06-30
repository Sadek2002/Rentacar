<?php
session_start();

// Connection creation
include_once "../includes/db_connection.php";

// Grab kenteken
$id = $_GET['id'];
$reservering_id = $_SESSION['name'];

$kenteken = $_SESSION['kenteken'] = $id;

$query = "UPDATE reservering SET auto_id = (?) WHERE reservering_id = '$reservering_id'";
$statement = $conn->prepare($query) or die("Error preparing");
$statement->bind_param('s',$id) or die('Error binding params');
$statement->execute() or die('Error executing');
$statement->close();

header('Location: carRental.php');
?>
