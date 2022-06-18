<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Reserveringen</title>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = "Connection successful!";


// Connection creation
$conn = new mysqli($servername, $username, $password);

// Connection check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $connection;
}
?>
<body>
<header>
    <div class="headerWrapper">
        <img class="logo" src="../image/logo.png">
        <p class="logoText">Rent a car admin</p>
        <button class="navButton" id="navTest"><a>≡</a></button>
    </div>

    <!--Navigation bar-->
    <div class="navBar">
        <ul class="dropDown">
            <li><a href="index.php">Home</a></li>
            <li><a href="autotoevoegen.php">Auto toevoegen</a></li>
            <li><a href="merkTypePrijs.php">Merk toevoegen</a></li>
            <li><a class="active" href="reserveringen.php">Reserveringen</a></li>
        </ul>
    </div>
</body>
</html>
