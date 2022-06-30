<?php
session_start();

// Connection creation
include_once "../includes/db_connection.php";

// Set image in carimages folder
$temp_location = $_FILES['image']['tmp_name'];
$target_location = '../carimages/' . time() . "_" . $_FILES['image']['name'];

move_uploaded_file($temp_location, $target_location);

if (isset($_POST['submit'])) {
    // Get ID
    $id = $_SESSION['id'];

    $query = "UPDATE auto SET foto = (?) WHERE kenteken = '$id'";
    $statement = $conn->prepare($query) or die("Error preparing");
    $statement->bind_param('s', $target_location) or die('Error binding params');
    $statement->execute() or die('Error inserting image in database (kenteken might be in use)');
    $statement->close();

    header('Location: index.php');
}
?>

