<?php
    session_start();

    // Get id
    $kenteken = $_SESSION['kenteken'];

    // Connection
    $mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

    // Get data
    $query = "
SELECT * FROM reservering 
INNER JOIN auto 
	ON reservering.auto_id = auto.kenteken 
INNER JOIN merktype 
	ON auto.merktype_id = merktype.id  
INNER JOIN klant 
	ON klant.klant_id
WHERE auto_id = 'test'";

    $result = mysqli_query($mysqli, $query) or die("Error with query");

    // Input data
    while ($row = mysqli_fetch_assoc($result)) {
        $brandstof = $row['brandstof'];
        $merk = $row['merk'];
        $type = $row['type'];
        $prijs = $row['prijs'];
        $ophaaldatum = $row['ophaaldatum'];
        $ophaaltijd = $row['ophaaltijd'];
        $retourdatum = $row['retourdatum'];
        $retourtijd = $row['retourtijd'];
    }

    // Create the basic email info to send
    $email_to = "salmousawi@roc-dev.com";
    $subject = "Betreft: Factuur Rent a Car";

    // Create the email headers
    $headers = "From: Rent a Car <salmousawi@roc-dev.com>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Create the html message
    $message = "
<html>
<style>

    * {
        margin: 0px;
    }

    body {
        background-color: white;
    }

    .emailImage {
        width: 50px;
        float: right;
    }

    table {
        background: gray;
        border: 1px black solid;
        width: 90%;
        margin: 10px 5% 0 5%;
    }

    th {
        height: 40px;
    }

    td {
        background-color: white;
        width: 15%;
        height: auto;
        text-align: center;
    }

</style>

<body>
    <div>
        <h1>Factuur</h1>
        <img class='emailImage' src='https://i.imgur.com/71kLQIZ.png'/>
        <p>Meerstraat 13</p>
        <p>1334 HK Almere</p>
        <p>Telefoon: (036)-39224932</p>
        <br>
        <p>Datum:</p>
        <p>Factuurnummer</p>
        <p>Behandelaar:</p>
        <h1>Reserveringen</h1>

    <table>
        <tr>
            <th>Kenteken</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Brandstof</th>
            <th>Gereserveerde periode</th>
            <th>Prijs per dag</th>
            <th>Totaal</th>
        </tr>
        <tr>
            <td><?php echo $kenteken ?></td>
            <td><?php echo $merk ?></td>
            <td><?php echo $type ?></td>
            <td><?php echo $brandstof ?></td>
            <td><?php echo '$' . $prijs ?></td>
            <td><?php echo '$' . $prijs ?></td>
        </tr>
    </table>
    </div>
</body>
</html>
";

    // Send email to the user
    if (mail($email_to, $subject, $message, $headers)) {
        echo "Vacature is gestuurd naar uw email";
    } else {
        "Not sent";
    }
?>

<html> 
<style>

    * {
        margin: 0px;
    }

    body {
        background-color: white;
    }

    .emailImage {
        width: 50px;
        float: right;
    }

    table {
        background: gray;
        border: 1px black solid;
        width: 90%;
        margin: 10px 5% 0 5%;
    }

    th {
        height: 40px;
    }

    td {
        background-color: white;
        width: 15%;
        height: auto;
        text-align: center;
    }

</style>

<body>
<div>
    <h1>Factuur</h1>
    <img class='emailImage' src='https://i.imgur.com/71kLQIZ.png'/>
    <p>Meerstraat 13</p>
    <p>1334 HK Almere</p>
    <p>Telefoon: (036)-39224932</p>
    <br>
    <p>Datum:</p>
    <p>Factuurnummer</p>
    <p>Behandelaar:</p>
    <h1>Reserveringen</h1>

    <table>
        <tr>
            <th>Kenteken</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Brandstof</th>
            <th>Gereserveerde periode</th>
            <th>Prijs per dag</th>
            <th>Totaal</th>
        </tr>
        <tr>
            <td><?php echo $kenteken ?></td>
            <td><?php echo $merk ?></td>
            <td><?php echo $type ?></td>
            <td><?php echo $brandstof ?></td>
            <td><?php echo "Ophaaldatum: " . $ophaaldatum . " Ophaaltijd: " .  $ophaaltijd . "<br> Retourdatum: " . $retourdatum . " Retourtijd: " .  $retourtijd ?></td>
            <td><?php echo "$" . $prijs ?></td>
            <td><?php echo "$" . $prijs ?></td>
        </tr>
    </table>
</div>
</body>
</html>
