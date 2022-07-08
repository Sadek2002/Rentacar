<?php
session_start();

// Connection creation
include_once "../includes/db_connection.php";

$email = $_GET['email'];
$factuurNr = $_GET['id'];

$query = "SELECT * FROM reservering 
INNER JOIN auto 
	ON reservering.auto_id = auto.kenteken 
INNER JOIN merktype 
	ON auto.merktype_id = merktype.id  
INNER JOIN klant 
	ON klant.klant_id = reservering.klant_id
WHERE klant.email = '$email'
ORDER BY reservering_id DESC";

$result = mysqli_query($conn, $query) or die("Error with query");

$date_now = date("d/m/Y");

echo '
    <h1>Factuur</h1>
        <img src=https://i.imgur.com/71kLQIZ.png style="width: 100px; float: right;"/>
        <p>Rent-a-Car</p>
        <p>Meerstraat 13</p>
        <p>1334 HK Almere</p>
        <p>Telefoon: (036)-39224932</p>

        <br>
        
        <p>Datum: '. $date_now .'</p>
        ';

echo '
        <p>Factuurnummer: #'. $factuurNr .'</p>
        <br>

        <h1>Reserveringen</h1>

    <table style="background: gray; border: 1px black solid; width: 100%;">
    
            <tr>
            <th style="height: 40px; color: white">Kenteken</th>
            <th style="height: 40px; color: white">Merk</th>
            <th style="height: 40px; color: white">Type</th>
            <th style="height: 40px; color: white">Brandstof</th>
            <th style="height: 40px; color: white">Gereserveerde periode</th>
            <th style="height: 40px; color: white">Prijs per dag</th>
            <th style="height: 40px; color: white">Totale dagen</th>
            <th style="height: 40px; color: white">Totaal</th>
        </tr>
    ';

// Get data
$totaalprijs = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $foto = $row['foto'];
    $kenteken = $row['kenteken'];
    $brandstof = $row['brandstof'];
    $merk = $row['merk'];
    $type = $row['type'];
    $prijs = $row['prijs'];

// Get total days
    $ophaaldatum = $row['ophaaldatum'];
    $retourdatum = $row['retourdatum'];
    $ophaaltijd = $row['ophaaltijd'];
    $retourtijd = $row['retourtijd'];

    // Get day difference
    $datetime1 = date_create($ophaaldatum);
    $datetime2 = date_create($retourdatum);

    $interval = $datetime1->diff($datetime2);
    $totaldays = $interval->days + 1;

    //totaal 1 auto
    $totaal = $prijs * $totaldays;

    $totaalprijs = $totaalprijs + $totaal;

    echo '
        <tr>
            <td style="width: 10%; text-align: center; background-color: white">'. $kenteken .'</td>
            <td style="width: 10%; text-align: center; background-color: white">'. $merk .'</td>
            <td style="width: 10%; text-align: center; background-color: white">'. $type .'</td>
            <td style="width: 10%; text-align: center; background-color: white">'. $brandstof .'</td>
            <td style="width: 27%; text-align: center; background-color: white">Ophaaldatum: '.$ophaaldatum.' Ophaaltijd: '. $ophaaltijd . '<br>Retoudatum: '. $retourdatum .' Retourtijd: '. $retourtijd .'</td>
            <td style="width: 10%; text-align: center; background-color: white">&euro;'. $prijs .'</td>
            <td style="width: 13%; text-align: center; background-color: white">'. $totaldays .'</td>
            <td style="width: 10%; background-color: white">&euro;'. $totaal .'</td>
        </tr>
    ';}

    $btw = $totaalprijs / 100 * 21;
    $totaal_btw = $totaalprijs + $btw;

echo ' 
          <tr>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: white">Totaal exclusief BTW</td>
            <td style="width: 15%; background-color: white">&euro;'. $totaalprijs .'</td>
        </tr>
         <tr>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: white">BTW</td>
            <td style="width: 15%; background-color: white">&euro;'. $btw .'</td>
        </tr>
         <tr>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: gray"></td>
            <td style="width: 15%; text-align: center; background-color: white">Totaal inclusief BTW</td>
            <td style="width: 15%; background-color: white">&euro;'. $totaal_btw .'</td>
        </tr>
        </table>
    ';
?>