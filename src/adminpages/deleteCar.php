<?php
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'rentacar') or die('Error connecting');
$query = "DELETE FROM auto WHERE kenteken = '$id'";
$result = mysqli_query($conn, $query) or die("Error deleting row");

$temp_location = $_FILES['image']['tmp_name'];
$target_location = '../carimages/' . time() . "_" . $_FILES['image']['name'];
header('Location: index.php');
?>