<?php
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

$id = $_GET['id'];

$query = "SELECT * FROM reservering 
INNER JOIN auto 
	ON reservering.auto_id = auto.kenteken 
INNER JOIN merktype 
	ON auto.merktype_id = merktype.id  
INNER JOIN klant 
	ON klant.klant_id = reservering.klant_id
WHERE reservering.klant_id = '$id'
    ";

$result = mysqli_query($mysqli, $query) or die("Error with query");
?>
<?php
// Get data
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

    // Get today's date
    $date_now = date("d/m/Y");

// Get total price with tax
    $totaal = $prijs;
    $btw = $prijs * $interval->days / 100 * 21;
    $totaal_btw = $prijs + $btw;
}
    ?>

    <?=
    "<div>
        <h1>Factuur</h1>
        <img src='https://i.imgur.com/71kLQIZ.png' style='width: 100px; float: right;'/>
        <p>Rent-a-Car</p>
        <p>Meerstraat 13</p>
        <p>1334 HK Almere</p>
        <p>Telefoon: (036)-39224932</p>

        <br>

        <p>Datum: <?php '.$date_now.' ?></p>
        <p>Factuurnummer: #$reservering_id</p>

        <br>

        <h1>Reserveringen</h1>

    <table style='background: gray; border: 1px black solid; width: 100%;'>
        <tr>
            <th style='height: 40px; color: white'>Kenteken</th>
            <th style='height: 40px; color: white'>Merk</th>
            <th style='height: 40px; color: white'>Type</th>
            <th style='height: 40px; color: white'>Brandstof</th>
            <th style='height: 40px; color: white'>Gereserveerde periode</th>
            <th style='height: 40px; color: white'>Prijs per dag</th>
            <th style='height: 40px; color: white'>Totale dagen</th>
            <th style='height: 40px; color: white'>Totaal</th>
        </tr>
        <tr>
            <td style='width: 10%; text-align: center; background-color: white'>$kenteken</td>
            <td style='width: 10%; text-align: center; background-color: white'>$merk</td>
            <td style='width: 10%; text-align: center; background-color: white'>$type</td>
            <td style='width: 10%; text-align: center; background-color: white'>$brandstof</td>
            <td style='width: 27%; text-align: center; background-color: white'>Ophaaldatum: $ophaaldatum Ophaaltijd: $ophaaltijd<br>Retoudatum: $retourdatum Retourtijd: $retourtijd</td>
            <td style='width: 10%; text-align: center; background-color: white'>&euro;$prijs</td>
            <td style='width: 13%; text-align: center; background-color: white'>$interval->days</td>
            <td style='width: 10%; background-color: white'>&euro;$totaal</td>
        </tr>
        <tr>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: white'>BTW</td>
            <td style='width: 15%; background-color: white'>&euro;$btw</td>
        </tr>
         <tr>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: gray'></td>
            <td style='width: 15%; text-align: center; background-color: white'>Totaal te betalen</td>
            <td style='width: 15%; background-color: white'>&euro;$totaal_btw</td>
        </tr>
    </table>
    </div>"
?>