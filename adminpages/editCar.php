<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="/scripts/navbar.js"></script>
    <title>Admin Home</title>
</head>
<?php
session_start();

// Connection creation
include_once "../includes/db_connection.php";

// Get ID
$id = $_GET['id'];
$_SESSION['id'] = $id;

// Select Data
$query = "SELECT a.*, mt.* FROM auto AS a
         INNER JOIN merktype as mt
         ON a.merktype_id = mt.id 
         WHERE kenteken = '$id'";
$result = mysqli_query($conn, $query) or die("Error with query");

$query2 = "SELECT * FROM merktype";
$result2 = mysqli_query($conn, $query2) or die("Error with query");


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
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="autotoevoegen.php">Auto toevoegen</a></li>
            <li><a href="merk.php">Merk toevoegen</a></li>
            <li><a href="kleur.php">Kleur toevoegen</a></li>
            <li><a href="brandstof.php">Brandstof toevoegen</a></li>
            <li><a href="reserveringen.php">Reserveringen</a></li>
        </ul>
    </div>

    <?php
         while ($row = mysqli_fetch_array($result)) {
             $merk = $row['merk'];
             $type = $row['type'];
             $prijs = $row['prijs'];
             $foto = $row['foto'];
             $kleur = $row['kleur'];
             $fuel = $row['brandstof'];

             echo '<div class="whiteBox">
        <form method="post" action="pushEdit.php" enctype="multipart/form-data">
            <label class="boxTitle">Auto toevoegen</label>

            <br>

            <div class="kenteken">
                <label for="addKenteken">Auto kenteken:</label><br>
                <input type="text" id="kenteken" name="editKenteken" required value=' . $id . '><br>
            </div>

            <div class="carImageEdit">
                <label for="image">Auto foto:</label><br>
                <img class= "imageCarEdit" src="' . $foto . '"/>
                <a href="changeImage.php" class="addButton">Change Image</a>
            </div>

            <br>

            <div class="kenteken">
                <label for="addColor">Auto brandstof:</label><br>
                <input type="text" id="kenteken" name="editFuel" required value=' . $fuel . '><br>
            </div>

            <br>

            <div class="kenteken">
                <label for="addFuel">Auto kleur:</label><br>
                <input type="text" id="kenteken" name="editColor" required value=' . $kleur . '><br>
            </div>
          
              <div class="kenteken">
                <label for="name">Model naam:</label><br>
                <select name="editMerkType" id="selectionType">
                ';}
                while ($row = mysqli_fetch_array($result2)) {
                    $id = $row['id'];
                    $merk = $row['merk'];
                    $type = $row['type'];
                    $prijs = $row['prijs'];
                    echo '<option value="'.$id.'">' . "Merk: " . $merk . " | " . "Type: " . $type . " | " . "Prijs: " . $prijs . '</option>';
                    }
                    echo '
                    </select>
            </div>
            <td><button class="addButton" type="submit" name="submit">Submit</button></td>
        </form>
    </div>
</header>
</body>
</html>
';
?>