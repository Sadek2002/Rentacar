<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Auto toevoegen</title>
</head>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

// Select Data
$query = "SELECT k.kleur,mt.merk,type,prijs FROM kleur k, merktype mt WHERE k.id = mt.id";

$merkQuery = "SELECT merk FROM merktype";
$result = mysqli_query($mysqli, $query) or die("Error with query");
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
            <li><a class="active" href="autotoevoegen.php">Auto toevoegen</a></li>
            <li><a href="merkTypePrijs.php">Merk toevoegen</a></li>
            <li><a href="kleur.php">Kleur toevoegen</a></li>
            <li><a href="brandstof.php">Brandstof toevoegen</a></li>
            <li><a href="reserveringen.php">Reserveringen</a></li>
        </ul>
    </div>

    <!--Auto toevoegen box-->
    <div class="whiteBox">
        <form method="post" action="uploadCar.php" enctype="multipart/form-data">
            <label class="boxTitle">Auto toevoegen</label>

            <br>

            <div class="fullWidthBox">
                <label for="kenteken">Kenteken:</label><br>
                <input type="text" id="kenteken" name="kenteken" maxlength="20"><br>
            </div>

            <br>

            <div class="modelNaam">
                <label for="name">Model naam:</label><br>
                <select name="" id="selectionType">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $merk = $row['merk'];
                        $type = $row['type'];
                        $prijs = $row['prijs'];

                        echo '<option>' . "Merk: " . $merk . " | " . "Type: " . $type . " | " . "Prijs: " . $prijs . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="carImage">
                <label for="image">Auto foto:</label><br>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <br>

            <div class="fullWidthBox">
                <label for="fuel">Brandstof type:</label><br>
                <input type="text" id="kenteken" name="fuel" maxlength="20"><br>
            </div>

            <br>

            <div class="fullWidthBox">
                <label for="brand">Kleur:</label><br>
                <input type="text" id="kenteken" name="color" maxlength="20"><br>
            </div>

            <button class="addButton">Toevoegen</button>
        </form>
    </div>
</body>
</html>