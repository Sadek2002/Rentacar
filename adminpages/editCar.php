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
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');
$id = $_GET['id'];
// Select Data
$query = "SELECT * from auto WHERE kenteken = '$id'";
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
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="autotoevoegen.php">Auto toevoegen</a></li>
            <li><a href="merk.php">Merk toevoegen</a></li>
            <li><a href="kleur.php">Kleur toevoegen</a></li>
            <li><a href="brandstof.php">Brandstof toevoegen</a></li>
            <li><a href="reserveringen.php">Reserveringen</a></li>
        </ul>
    </div>

    <?php
        echo '<div class="whiteBox">
        <form method="post" action="pushEdit.php" enctype="multipart/form-data">
            <label class="boxTitle">Auto toevoegen</label>

            <br>

            <div class="kenteken">
                <label for="addKenteken">Auto kenteken:</label><br>
                <input type="text" id="kenteken" name="addKenteken" required value=$id><br>
            </div>

            <div class="carImage">
                <label for="image">Auto foto:</label><br>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <br>

            <div class="fullWidthBox">
                <label for="addColor">Auto brandstof:</label><br>
                <input type="text" id="kenteken" name="addFuel" required value=><br>
            </div>

            <br>

            <div class="fullWidthBox">
                <label for="addFuel">Auto kleur:</label><br>
                <input type="text" id="kenteken" name="addColor" required><br>
            </div>
            <td><a class="addButton" href="pushEdit.php?id=' .$id . '">Edit</a></td>
        </form>
    </div>';
    ?>


</header>
</body>
</html>
