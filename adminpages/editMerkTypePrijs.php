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
$query = "SELECT * FROM merktype
         WHERE id = '$id'";
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
            <li><a href="index.php">Home</a></li>
            <li><a href="autotoevoegen.php">Auto toevoegen</a></li>
            <li><a class="active" href="merkTypePrijs.php">Merk toevoegen</a></li>
            <li><a href="reserveringen.php">Reserveringen</a></li>
        </ul>
    </div>

<?php
while ($row = mysqli_fetch_array($result)) {
    $merk = $row['merk'];
    $type = $row['type'];
    $prijs = $row['prijs'];

    echo '<div class="whiteBox">
        <form method="post" action="pushEditMerkTypePrijs.php" enctype="multipart/form-data">
            <label class="boxTitle">Merk type prijs wijzigen</label>
            
            <br>

            <div class="fullWidthBox">
                <label for="addKenteken">Auto merk:</label><br>
                <input type="text" id="kenteken" name="editMerk" required value=' . $merk . '><br>
            </div>

            <div class="fullWidthBox">
                <label for="addKenteken">Auto type:</label><br>
                <input type="text" id="kenteken" name="editType" required value=' . $type . '><br>
            </div>

            <br>

            <div class="fullWidthBox">
                <label for="addKenteken">Auto prijs:</label><br>
                <input type="text" id="kenteken" name="editPrijs" required value=' . $prijs . '><br>
            </div>

            <br>
            
            <td><button class="addButton" type="submit" name="submit">Submit</button></td>
        </form>
    </div>
</header>
</body>
</html>
';}
?>