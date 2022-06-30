<?php
$id = $_GET['id'];

// Connection creation
include_once "../includes/db_connection.php";

$query = "DELETE FROM auto WHERE kenteken = '$id'";
$result = mysqli_query($conn, $query) or die("Error deleting row");

$temp_location = $_FILES['image']['tmp_name'];
$target_location = '../carimages/' . time() . "_" . $_FILES['image']['name'];
header('Location: index.php');
?>