<?php
session_start();

// Connection creation
include_once "../includes/db_connection.php";

// Get ID
$id = $_SESSION['id'];

// Select Data
$query = "SELECT foto FROM auto WHERE kenteken = '$id'";
$result = mysqli_query($conn, $query) or die("Error with query");

while ($row = mysqli_fetch_array($result)) {
    $foto = $row['foto'];

    echo '
<header>
    <div class="headerWrapper">
        <img class="logo" src="../image/logo.png">
        <p class="logoText">Rent a car admin</p>
        <button class="navButton" id="navTest"><a>≡</a></button>
    </div>

    <!--Navigation bar-->
    <div class="navBar">
        <ul class="dropDown">
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="autotoevoegen.php">Auto toevoegen</a></li>
            <li><a href="merk.php">Merk toevoegen</a></li>
            <li><a href="reserveringen.php">Reserveringen</a></li>
        </ul>
    </div>
<div class="whiteBoxImage">
    <form method="post" action="pushImage.php" enctype="multipart/form-data">
    <link rel="stylesheet" href="style.css">
    <title>Admin Edit</title>
                <label class="boxTitle">Foto wijzigen</label>
                
                <br>
                
                <img class= "imageCarEdit" src="' . $foto . '"/>
                
                <br>
                
                <input type="file" id="image" name="image" accept="image/*" value=' . $foto . ' required>
                
                <td><button class="addButton" type="submit" name="submit">Submit</button></td>
                </div>
    </form>
</div>
</header>
';}
?>