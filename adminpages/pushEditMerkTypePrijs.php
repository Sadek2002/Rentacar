<?php
session_start();

// Connection creation
include_once "../includes/db_connection.php";

if (isset($_POST['submit'])) {
    $merk = $_POST['editMerk'];
    $type = $_POST['editType'];
    $prijs = $_POST['editPrijs'];

    // Get ID
    $id = $_SESSION['id'];

    echo $id;

    $query = "UPDATE merktype SET merk = (?), type = (?), prijs = (?) WHERE id = '$id'";
    $statement = $conn->prepare($query) or die("Error preparing");
    $statement->bind_param('sss', $merk, $type, $prijs) or die('Error binding params');
    $statement->execute() or die('Error inserting image in database (kenteken might be in use)');
    $statement->close();

    header('Location: merkTypePrijs.php');
}
?>

