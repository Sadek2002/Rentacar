<?php
// Connection creation
include_once "../includes/db_connection.php";

// Get cars
$query = "SELECT * FROM auto INNER JOIN merktype ON auto.merktype_id = merktype.id";
$result = mysqli_query($conn, $query) or die("Error with query");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../adminpages/style.css">
    <title>Car Selection</title>
<header>
    <div class="headerWrapper">
        <img class="logo" src="../image/logo.png">
        <p class="logoText">Rent a car</p>
        <button class="navButton" id="navTest"><a>≡</a></button>
    </div>

    <!--Navigation bar-->
    <div class="navBar">
        <ul class="dropDown">
            <li><a href="index.php">Auto huren</a></li>
            <li><a class="active" href="">Auto aanbod</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Veel gestelde vragen</a></li>
        </ul>
    </div>

    <?php
    while ($row = mysqli_fetch_array($result)) {
        $foto = $row['foto'];
        $brandstof = $row['brandstof'];
        $kleur = $row['kleur'];
        $merk = $row['merk'];
        $type = $row['type'];
        $prijs = $row['prijs'];

        echo '
            <div class="showCar">
            <div class="imageWrapper">
            <img class= "imageCar" src="' . $foto . '"/>
            </div>
            <p class="imageTitle">' . $merk . ' ' . $type . '</p>
            <p class="imageText">Brandstof: ' . $brandstof . '</p>
            <p class="imageText">Kleur: ' . $kleur . '</p>
            <p class="imageText">Prijs per dag: €' . $prijs . '</p>
            ' .
            '
            </div>
        ';
    }
    ?>

</header>
</html>

