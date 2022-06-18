<?php
// Database form
$merk = $_POST['addBrand'];
$types = $_POST['addType'];
$prijs = $_POST['addPrice'];

$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');
$query = "INSERT INTO merktype VALUES (0,?,?,?)";
$statement = $mysqli->prepare($query) or die("Error preparing");
$statement->bind_param('sss',$merk, $types, $prijs) or die('Error binding params');
$statement->execute() or die('Error inserting image in database (kenteken might be in use)');
$statement->close();

header('Location: merkTypePrijs.php');
?>