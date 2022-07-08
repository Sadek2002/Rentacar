<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "rentacar";

    $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName) or die('Error connecting');
?>