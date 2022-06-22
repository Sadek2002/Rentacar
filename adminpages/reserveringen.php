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
// Connection creation
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

// Select Data
$query = "
SELECT * FROM reservering 
INNER JOIN auto
	on auto_id = kenteken
INNER JOIN merktype 
	ON merktype_id = id
ORDER BY reservering_id DESC
	";

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
            <li><a href="autotoevoegen.php">Auto toevoegen</a></li>
            <li><a href="merkTypePrijs.php">Merk toevoegen</a></li>
            <li><a class="active" href="reserveringen.php">Reserveringen</a></li>
        </ul>
    </div>

    <!--item table-->
    <table>
        <tr>
            <th>Reservering nummer</th>
            <th>Car image</th>
            <th>Auto kenteken</th>
            <th>Brandstof</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Prijs per dag</th>
            <th>Totale dagen</th>
            <th>Totale prijs</th>
            <th>View</th>
            <th>Delete</th>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                $reservering_id = $row['reservering_id'];
                $foto = $row['foto'];
                $kenteken = $row['kenteken'];
                $brandstof = $row['brandstof'];
                $merk = $row['merk'];
                $type = $row['type'];
                $prijs = $row['prijs'];

                // Get total days
                $ophaaldatum = $row['ophaaldatum'];
                $retourdatum = $row['retourdatum'];
                $datetime1 = date_create($ophaaldatum);
                $datetime2 = date_create($retourdatum);

                $interval = $datetime1->diff($datetime2);

                // Get total price with tax
                $totaal = $prijs;
                $btw = $prijs * $interval->days / 100 * 21;
                $totaal_btw = $prijs + $btw ;

                echo '<tr>
                <td>' . $reservering_id . '</td>
                <td><img class= "image" src="' . $foto . '"/></td>
                <td>' . $kenteken . '</td>
                <td>' . $brandstof . '</td>
                <td>' . $merk . '</td>
                <td>' . $type . '</td>
                <td>' . "$" . $prijs . '</td>
                <td>' . $interval->days . '</td>
                <td>' . "$" . $totaal_btw . '</td>' .
                    '

                <td><a class="editButton" href="viewReservering.php?id=' . $reservering_id . '">View</a></td>
                <td><a class="deleteButton" href="deleteReservering.php?id=' . $reservering_id . '">Delete</a></td>
                  </tr>';
            }
            ?>
        </tr>
    </table>
</body>
</html>
