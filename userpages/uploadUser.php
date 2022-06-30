<?php
session_start();

// Database form
$email = $_POST['addEmail'];
$voornaam = $_POST['addName'];
$tussenvoegsel = $_POST['addMiddlename'];
$achternaam = $_POST['addLastname'];
$geboortedatum = $_POST['addBirthdate'];
$adres = $_POST['addPlace'];
$postcode = $_POST['addPostalcode'];
$plaats = $_POST['addStreet'];

// Connection creation
include_once "../includes/db_connection.php";

$conn->autocommit(FALSE);

$query = $conn->prepare("INSERT INTO klant VALUES (0,?,?,?,?,?,?,?,?)");
$query2 = $conn->prepare("SELECT LAST_INSERT_ID()");

$query->bind_param('ssssssss',$email, $voornaam ,$tussenvoegsel, $achternaam, $geboortedatum, $adres, $postcode, $plaats) or die('Error binding params');
$query->execute() or die('Error executing');
$query2->execute() or die('Error executing');
$query2->store_result();
$query2->bind_result($result);
$conn->autocommit(TRUE);

while ($query2->fetch()) {
    echo $result;
}

$query2->free_result();
$query2->close();

$_SESSION['klant'] = $result;

$_SESSION['email'] = $_POST['addEmail'];;

header('Location: uploadUserID.php');
?>

