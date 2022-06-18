<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Merk wijzigen</title>
</head>
<?php
// Connection creation
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

// Select Data
$query = "SELECT id, merk, type, prijs FROM merktype";
$result = mysqli_query($mysqli, $query) or die("Error with query");
?>
<body>
<header>
    <div class="headerWrapper">
        <img class="logo" src="../image/logo.png">
        <p class="logoText">Rent a car admin</p>
        <button class="navButton" id="navTest"><a>≡</a></button>
    </div>
</header>

    <!--Navigation bar-->
    <div class="navBar">
        <ul class="dropDown">
            <li><a href="index.php">Home</a></li>
            <li><a href="autotoevoegen.php">Auto toevoegen</a></li>
            <li><a class="active" href="merkTypePrijs.php">Merk toevoegen</a></li>
            <li><a href="reserveringen.php">Reserveringen</a></li>
        </ul>

        <!--Merk toevoegen box-->
        <div class="whiteBox">
            <form method="post" action="uploadMerkTypePrijs.php" enctype="multipart/form-data">
                <label class="boxTitle">Auto merk toevoegen</label>

                <br>

                <div class="fullWidthBox">
                    <label for="addBrand">Auto merk:</label><br>
                    <input type="text" id="addBrand" name="addBrand" required><br>
                </div>
        </div>

        <div class="whiteBox">
            <label class="boxTitle">Auto type toevoegen</label>

            <br>

            <div class="fullWidthBox">
                <label for="addType">Auto type:</label><br>
                <input type="text" id="addBrand" name="addType" required><br>
            </div>
        </div>

        <div class="whiteBox">
            <label class="boxTitle">Auto prijs:</label>

            <br>

            <div class="fullWidthBox">
                <label for="addPrice">Auto prijs:</label><br>
                <input type="text" id="addBrand" name="addPrice" required><br>
            </div>
        </div>

        <button class="addButton">Toevoegen</button>
        </form>
    </div>
    </div>

    <table>
        <tr>
            <th>Merk</th>
            <th>Type</th>
            <th>Prijs</th>
            <th>Edit</th>
            <th>Delete</th>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $merk = $row['merk'];
        $types = $row['type'];
        $prijs = $row['prijs'];
        $id = $row['id'];

        echo '<tr>
        <td>' . $merk . '</td>
        <td>' . $types . '</td>
        <td>' . $prijs . '</td>
        <td><a class="editButton" href="merkTypePrijs.php?id=' . $id . '">Edit</a></td>
        <td><a class="deleteButton" href="deleteMerkTypePrijs.php?id=' . $id . '">Delete</a></td>
    </tr>';
    }
    ?>
        </tr>
    </table>
</body>
</html>
