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
// Connection creation
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

// Select Data
$query = "SELECT * FROM auto INNER JOIN merktype ON merktype_id = id";
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
            <li><a class="active"href="index.php">Home</a></li>
            <li><a href="autotoevoegen.php">Auto toevoegen</a></li>
            <li><a href="merkTypePrijs.php">Merk toevoegen</a></li>
            <li><a href="reserveringen.php">Reserveringen</a></li>
        </ul>
    </div>


    <!--Item table-->
    <table>
        <tr>
            <th>Car image</th>
            <th>Auto kenteken</th>
            <th>Brandstof</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Prijs</th>
            <th>Kleur</th>
            <th>Edit</th>
            <th>Delete</th>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                $foto = $row['foto'];
                $kenteken = $row['kenteken'];
                $brandstof = $row['brandstof'];
                $kleur = $row['kleur'];
                $merk = $row['merk'];
                $type = $row['type'];
                $prijs = $row['prijs'];

                echo '<tr>
                <td><img class= "image" src="' . $foto . '"/></td>
                <td>' . $kenteken . '</td>
                <td>' . $brandstof . '</td>
                <td>' . $merk . '</td>
                <td>' . $type . '</td>
                <td>' . $prijs . '</td>
<td>' . $kleur . '</td>' .
                    '

                <td><a class="editButton" href="index.php?id=' .$kenteken . '">Edit</a></td>
                <td><a class="deleteButton" href="deleteCar.php?id=' .$kenteken. '">Delete</a></td>
                  </tr>';
            }
            ?>
        </tr>
    </table>
    </div>
</header>
</body>
</html>
