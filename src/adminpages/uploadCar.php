<?php
// Set image in carimages folder
$temp_location = $_FILES['image']['tmp_name'];
$target_location = '../carimages/' . time() . "_" . $_FILES['image']['name'];

move_uploaded_file($temp_location, $target_location);

// Database form
$kenteken = $_POST['addKenteken'];
$brandstof = $_POST['addFuel'];
$kleur = $_POST['addColor'];
$merktypeid = $_POST['addMerkType'];

$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');
$query = "INSERT INTO auto VALUES (?,?,?,?,?)";
$statement = $mysqli->prepare($query) or die("Error preparing");
$statement->bind_param('sssss',$kenteken, $brandstof, $kleur ,$target_location, $merktypeid) or die('Error binding params');
$statement->execute() or die('Error inserting image in database (kenteken might be in use)');
$statement->close();

header('Location: autotoevoegen.php');
?>

