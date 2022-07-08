<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../adminpages/style.css">
    <title>Car Selection</title>
</head>
<?php
session_start();

$insertedOphaaldatum = $_SESSION['ophaaldatum'];
$insertedRetourdatum = $_SESSION['retourdatum'];
$insertedOphaaltijd = $_SESSION['ophaaltijd'];
$insertedRetourtijd = $_SESSION['retourtijd'];

// Connection creation
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

// Get car id
$query = "  SELECT a.*, mt.*, r.*
            FROM auto AS a
			LEFT JOIN merktype AS mt ON a.merktype_id = mt.id
            LEFT JOIN reservering AS r ON r.auto_id = a.kenteken
            WHERE r.auto_id NOT IN (SELECT auto_id from reservering
            
            WHERE ((ophaaldatum BETWEEN '$insertedOphaaldatum' AND '$insertedRetourdatum' 
                    OR retourdatum BETWEEN '$insertedOphaaldatum' AND '$insertedRetourdatum')
                    
            OR ('$insertedOphaaldatum' BETWEEN ophaaldatum AND retourdatum
                OR '$insertedRetourdatum' BETWEEN ophaaldatum AND retourdatum))
                                    
			AND auto_id IS NOT NULL
            )
            OR (auto_id IS NULL)
            GROUP BY a.kenteken
        ";



$result = mysqli_query($mysqli, $query) or die("Error with query");
?>
<header>
    <div class="headerWrapper">
        <img class="logo" src="../image/logo.png">
        <p class="logoText">Rent a car</p>
        <button class="navButton" id="navTest"><a>≡</a></button>
    </div>

    <!--Navigation bar-->
    <div class="navBar">
        <ul class="dropDown">
            <li><a class="active" href="index.php">Auto huren</a></li>
            <li><a href="autoAanbod.php">Auto aanbod</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="faq.php">Veel gestelde vragen</a></li>
        </ul>
    </div>

    <?php
    while ($row = mysqli_fetch_array($result)) {
        $kenteken = $row['kenteken'];
        $foto = $row['foto'];
        $brandstof = $row['brandstof'];
        $kleur = $row['kleur'];
        $merk = $row['merk'];
        $type = $row['type'];
        $prijs = $row['prijs'];
        $ophaaldatum = $row['ophaaldatum'];
        $retourdatum = $row['retourdatum'];

        $_SESSION['kenteken'] = $kenteken;

        echo '
            <div class="showCar">
            <div class="imageWrapper">
            <img class= "imageCar" src="' . $foto . '"/>
            </div>
            <p class="imageTitle">' . $merk . ' ' . $type . '</p>
            <p class="imageText">Brandstof: ' . $brandstof . '</p>
            <p class="imageText">Kleur: ' . $kleur . '</p>
            <p class="imageText">Prijs per dag: €' . $prijs . '</p>
            
            <a class="selectButton" href="uploadKenteken.php?id=' . $kenteken . '">Select</a>
            ' .
            '
            </div>
        ';
    }
    ?>

    <footer>
        <table class="footerTable">
            <tr>
                <th class="footerTableHeader">Rentacar</th>
                <th class="footerTableHeader">Contact</th>
            </tr>

            <tr>
                <td class="footerTableData">Huur leuke en goedgekeurde auto's</td>
                <td class="footerTableData">Tel: 06-19195844</td>
                <td class="footerTableData"><a class="footerLinks" href="">Algemene voorwaarden</a></td>
            </tr>

            <tr>
                <td class="footerTableData"></td>
                <td class="footerTableData"><a class="footerLinks" href="">info@rentacar.nl</a></td>
                <td class="footerTableData"><a class="footerLinks" href="">Privacyverklaring</a></td>
            </tr>

            <tr>
                <td class="footerTableData"></td>
                <td class="footerTableData">Janpeterstraat 21</td>
            </tr>

            <tr>
                <td class="footerTableData"></td>
                <td class="footerTableData">2339HK, Almere</td>
            </tr>
        </table>
    </footer>
</header>
<body>
</html>
