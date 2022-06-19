<?php

// Database form
$email = $_POST['addEmail'];
$voornaam = $_POST['addName'];
$tussenvoegsel = $_POST['addMiddlename'];
$achternaam = $_POST['addLastname'];
$geboortedatum = $_POST['addBirthdate'];
$adres = $_POST['addPlace'];
$postcode = $_POST['addPostalcode'];
$plaats = $_POST['addStreet'];

$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');
$query = "INSERT INTO klant VALUES (0,?,?,?,?,?,?,?,?)";
$statement = $mysqli->prepare($query) or die("Error preparing");
$statement->bind_param('ssssssss',$email, $voornaam ,$tussenvoegsel, $achternaam, $geboortedatum, $adres, $postcode, $plaats) or die('Error binding params');
$statement->execute() or die('Error inserting image in database (kenteken might be in use)');
$statement->close();

header('Location: uploadRental.php');
?>

