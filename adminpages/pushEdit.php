<?php
session_start();

// Connection creation
include_once "../includes/db_connection.php";

if (isset($_POST['submit'])) {
    $kenteken = $_POST['editKenteken'];
    $brandstof = $_POST['editFuel'];
    $kleur = $_POST['editColor'];
    $merktypeid = $_POST['editMerkType'];

    echo $kenteken;
    echo $brandstof;
    echo $kleur;
    echo $merktypeid;

    // Get ID
    $id = $_SESSION['id'];

    $query = "UPDATE auto SET kenteken = (?), brandstof = (?), kleur = (?), merktype_id = (?) WHERE kenteken = '$id'";
    $statement = $conn->prepare($query) or die("Error preparing");
    $statement->bind_param('ssss', $kenteken, $brandstof, $kleur, $merktypeid) or die('Error binding params');
    $statement->execute() or die('Error inserting image in database (kenteken might be in use)');
    $statement->close();

    header('Location: index.php');
}
?>

