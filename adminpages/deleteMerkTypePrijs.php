<?php
$id = $_GET['id'];

// Connection creation
include_once "../includes/db_connection.php";

$query = "DELETE FROM merktype WHERE id = '$id'";
$result = mysqli_query($conn, $query) or die("Error deleting row");

header('Location: merkTypePrijs.php');
?>