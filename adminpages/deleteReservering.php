<?php
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'rentacar') or die('Error connecting');
$query = "DELETE FROM reservering WHERE reservering_id = '$id'";
$result = mysqli_query($conn, $query) or die("Error deleting row");

header('Location: reserveringen.php');
?>