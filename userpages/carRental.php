<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../adminpages/style.css">
    <title>Car Rental</title>
</head>
<?php
// Connection creation
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');
$id = $_GET['id'];

// Select Data
$query = "SELECT * FROM auto INNER JOIN merktype ON merktype_id = id WHERE kenteken= '$id'";
$result = mysqli_query($mysqli, $query) or die("Error with query");
?>
<body>
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
            <li><a href="">Auto aanbod</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Veel gestelde vragen</a></li>
        </ul>
    </div>

<!--Display car data-->
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $kenteken = $row['kenteken'];
        $foto = $row['foto'];
        $brandstof = $row['brandstof'];
        $kleur = $row['kleur'];
        $merk = $row['merk'];
        $type = $row['type'];
        $prijs = $row['prijs'];

        echo '
            <div class="whiteBoxImage">
                <p class="imageCarTitle">Geselecteerde auto:</p>
                <img class= "imageCarBox" src="' . $foto . '"/>
            </div>
            <div class="whiteBoxImage">
                <p class="carDataTitle">' . $merk . ' ' . $type . '</p><br>
                <p class="carData">Brandstof: ' . $brandstof . '</p><br>
                <p class="carData">Kleur: ' . $kleur . '</p><br>
                <p class="carData">Prijs per dag: $' . $prijs . '</p><br>
                <p class="carData">Ophaaldatum: 10/07/2022 Ophaaltijd: 15:30</p><br>
                <p class="carData">Retourdatum: 15/07/2022 Retourtijd: 15:30</p><br><br>
                <p class="carData"><b>Totale bedrag:</b></p><br>
                <p class="carData">Totale huur periode: 5 dagen</p><br>
                <p class="carData" style="padding-bottom: 10px">Bedrag: €615</p><br>
            </div>
            
            <div class="whiteBoxImage">
            <form method="post" action="uploadUser.php" enctype="multipart/form-data">
                <label class="carDataTitle" style="padding-bottom: 10px">Jouw gegevens</label>
                    
            </br>
                    
            <div class="carUserDataBox">
                <label for="addKenteken">Email</label><br>
                <input type="email" id="kenteken" name="addEmail" required><br>
            </div>
                    
            </br>
                    
            <div class="carUserDataBox">
                <label for="addKenteken">Voornaam</label><br>
                <input type="text" id="kenteken" name="addName" required><br>
            </div>
                    
            </br>
                    
            <div class="carUserDataBox">
                <label for="addKenteken">Tussenvoegsel(s)</label><br>
                <input type="text" id="kenteken" name="addMiddlename" required><br>
            </div>
                    
            </br>
                    
            <div class="carUserDataBox">
                <label for="addKenteken">Achternaam</label><br>
                <input type="text" id="kenteken" name="addLastname" required><br>
            </div>
                    
            </br>
                    
            <div class="carUserDataBox">
                <label for="addKenteken">Geboortedatum</label><br>
                <input type="date" id="kenteken" name="addBirthdate" required><br>
            </div>
                    
            </br>
                    
            <div class="carUserDataBox">
                <label for="addKenteken">Plaats</label><br>
                <input type="text" id="kenteken" name="addPlace" required><br>
            </div>
                    
            <div class="carUserDataBox">
                <label for="addKenteken">Straat</label><br>
                <input type="text" id="kenteken" name="addStreet" required><br>
            </div>
                    
            </br>
                    
            <div class="carUserDataBox">
                <label for="addKenteken">Postcode</label><br>
                <input type="text" id="kenteken" name="addPostalcode" required><br>
                <input type="hidden" name="kenteken" value="'.  $kenteken .'">
            </div>
            <button class="addButton">Toevoegen</button>
            </form>
            </div>
            
        ';
    }
    ?>
</header>
</body>
</html>
