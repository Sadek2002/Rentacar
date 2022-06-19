<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../adminpages/style.css">
    <title>Car Selection</title>
</head>
<?php
// Connection creation
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

// Get data id
$query =
"SELECT * FROM reservering
UNION ALL
SELECT * FROM auto INNER JOIN merktype ON merktype_id = id";

$result = mysqli_query($mysqli, $query) or die("Error with query");
?>
<header>
    <div class="headerWrapper">
        <img class="logo" src="../image/logo.png">
        <p class="logoText">Rent a car</p>
        <button class="navButton" id="navTest"><a>≡</a></button>
    </div>

    <!--Navigation bar-->
    <div class="navBar">
        <ul class="dropDown">
            <li><a class="active" href="index.php">Auto huren</a></li>
            <li><a href="">Auto aanbod</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Veel gestelde vragen</a></li>
        </ul>
    </div>

    <?php
    while ($row = mysqli_fetch_array($result)) {
        $kenteken = $row['kenteken'];
        $foto = $row['foto'];
        $brandstof = $row['brandstof'];
        $kleur = $row['kleur'];
        $merk = $row['merk'];
        $type = $row['type'];
        $prijs = $row['prijs'];
        $reservering_id = $row['reservering_id'];

        echo '
            <div class="showCar">
            <div class="imageWrapper">
            <img class= "imageCar" src="' . $foto . '"/>
            </div>
            <p class="imageTitle">'.$merk.' '.$type.'</p>
            <p class="imageText">Brandstof: ' . $brandstof . '</p>
            <p class="imageText">Kleur: ' . $kleur . '</p>
            <p class="imageText">Prijs per dag: €' . $prijs . '</p>
            
            <a class="selectButton" href="uploadKenteken.php?id=' .$reservering_id . '">Select</a>
            ' .
            '
            </div>
        ';
    }
        ?>

</header>
<body>

</body>
</html>
