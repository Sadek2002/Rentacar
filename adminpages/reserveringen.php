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
session_start();

// Connection creation
include_once "../includes/db_connection.php";

// Select Data
$query = "
SELECT * FROM reservering 
INNER JOIN klant
    on reservering.klant_id = klant.klant_id
INNER JOIN auto
	on auto_id = kenteken
INNER JOIN merktype 
	ON merktype_id = id
ORDER BY reservering_id DESC
	";

$result = mysqli_query($conn, $query) or die("Error with query");

$date_now = date("Y/m/d");

$query2 = "
SELECT * FROM reservering 
INNER JOIN klant
    on reservering.klant_id = klant.klant_id
INNER JOIN auto
	on auto_id = kenteken
INNER JOIN merktype 
	ON merktype_id = id
WHERE reservering.ophaaldatum = '$date_now'
OR (reservering.retourdatum = '$date_now')
ORDER BY ophaaltijd OR retourtijd ASC
";

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
            <li><a href="merkTypePrijs.php">Merk toevoegen</a></li>
            <li><a class="active" href="reserveringen.php">Reserveringen</a></li>
        </ul>
    </div>

    <!--item table-->
    <table>
        <tr>
            <th style="color: white">Reserveringen voor vandaag</th>
        </tr>
        <tr>
            <th>Factuur nummer</th>
            <th>Ophaal info</th>
            <th>Retour info</th>
            <th>Car image</th>
            <th>Auto kenteken</th>
            <th>Voornaam</th>
            <th>t.v</th>
            <th>Achternaam</th>
            <th>Totale prijs</th>
            <th>View</th>
            <?php

            while ($row = mysqli_fetch_array($result2)) {
                // Get factuur number
                $reservering_id = $row['reservering_id'];

                // Get car data
                $kenteken = $row['kenteken'];
                $foto = $row['foto'];
                $prijs = $row['prijs'];

                // Get customer data
                $email = $row['email'];
                $voornaam = $row['voornaam'];
                $tussenvoegsel = $row['tussenvoegsel'];
                $achternaam = $row['achternaam'];

                $ophaaltijd = $row['ophaaltijd'];
                $retourtijd = $row['retourtijd'];

                $useremail = $_SESSION['email'] = $email;

                // Get total days
                $ophaaldatum = $row['ophaaldatum'];
                $retourdatum = $row['retourdatum'];
                $datetime1 = date_create($ophaaldatum);
                $datetime2 = date_create($retourdatum);

                $interval = $datetime1->diff($datetime2);

                $totaldays = $interval->days + 1;

                // Get price
                $totaal = $prijs * $totaldays;
                $btw = $prijs * $totaldays / 100 * 21;
                $totaal_btw = $totaal + $btw;
                $btw = $prijs * $totaldays / 100 * 21;

                echo '<tr>
                <td>#' . $reservering_id . '</td>
                <td>' . $ophaaldatum . ' . '. $ophaaltijd .'</td>
                <td>' . $retourdatum .' . '. $retourtijd .'</td>
                <td><img class= "image" src="' . $foto . '"/></td>
                <td>' . $kenteken . '</td>
                <td>' . $voornaam . '</td>
                <td>' . $tussenvoegsel . '</td>
                <td>' . $achternaam . '</td>
                <td>' . "$" . $totaal_btw . '</td>
                <td><a class="editButton" href="viewReservering.php?email=' . $useremail . ' & id=' . $reservering_id .'">View</a></td>
                  </tr>
            ';}
            ?>
        </tr>
    </table>

    <!--item table-->
    <table>
        <tr>
            <th style="color: white">Alle reserveringen</th>
        </tr>
        <tr>
            <th>Factuur nummer</th>
            <th>Car image</th>
            <th>Auto kenteken</th>
            <th>Voornaam</th>
            <th>t.v</th>
            <th>Achternaam</th>
            <th>Totale prijs</th>
            <th>View</th>
            <th>Delete</th>
            <?php

            while ($row = mysqli_fetch_array($result)) {
                // Get factuur number
                $reservering_id = $row['reservering_id'];

                // Get car data
                $kenteken = $row['kenteken'];
                $foto = $row['foto'];
                $prijs = $row['prijs'];

                // Get customer data
                $email = $row['email'];
                $voornaam = $row['voornaam'];
                $tussenvoegsel = $row['tussenvoegsel'];
                $achternaam = $row['achternaam'];

                $useremail = $_SESSION['email'] = $email;

                // Get total days
                $ophaaldatum = $row['ophaaldatum'];
                $retourdatum = $row['retourdatum'];
                $datetime1 = date_create($ophaaldatum);
                $datetime2 = date_create($retourdatum);

                $interval = $datetime1->diff($datetime2);

                $totaldays = $interval->days + 1;

                // Get price
                $totaal = $prijs * $totaldays;
                $btw = $prijs * $totaldays / 100 * 21;
                $totaal_btw = $totaal + $btw;
                $btw = $prijs * $totaldays / 100 * 21;

                echo '<tr>
                <td>#' . $reservering_id . '</td>
                <td><img class= "image" src="' . $foto . '"/></td>
                <td>' . $kenteken . '</td>
                <td>' . $voornaam . '</td>
                <td>' . $tussenvoegsel . '</td>
                <td>' . $achternaam . '</td>
                <td>' . "$" . $totaal_btw . '</td>
                <td><a class="editButton" href="viewReservering.php?email=' . $useremail . ' & id=' . $reservering_id .'">View</a></td>
                <td><a class="deleteButton" href="deleteReservering.php?id=' . $reservering_id . '">Delete</a></td>
                  </tr>
            ';}
            ?>
        </tr>
    </table>
</body>
</html>
