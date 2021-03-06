<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../adminpages/style.css">
    <title>Main Page</title>
</head>
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
</header>
<body>
    <div class="homeImage">
        <img class="carImageUser" src="../image/car.png" alt="">
        <p class="carTextTop">Auto huren?</p> <br>
        <p class="carTextBottom">Reserveer nu een hier beneden!</p>
    </div>

    <div class="whiteBox">
        <form method="post" action="uploadRentaltime.php" enctype="multipart/form-data">
            <label class="boxTitle">Auto toevoegen</label>

            <br>

            <div class="fullWidthBox">
                <label for="addKenteken">Ophaal locatie:</label><br>
                <p class="Ophaallocatie">Almere</p>
            </div>

            <br>

            <div class="kenteken">
                <label for="addOphaaldatum">Ophaal datum:</label><br>
                <input type="date" id="kenteken" name="addOphaaldatum"><br>
            </div>

            <div class="carImage">
                <label for="addOphaaltijd">Ophaaltijd:</label><br>
                <input type="time" id="kenteken" name="addOphaaltijd">
            </div>

            <br>

            <div class="kenteken">
                <label for="addRetourdatum">Retourdatum:</label><br>
                <input type="date" id="kenteken" name="addRetourdatum"><br>
            </div>

            <div class="carImage">
                <label for="image">Retourtijd:</label><br>
                <input type="time" id="kenteken" name="addRetourtijd"><br>
            </div>

            <button class="addButton">Toevoegen</button>
        </form>
    </div>

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
</body>
</html>
