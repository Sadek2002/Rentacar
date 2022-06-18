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
            <li><a href="">Auto aanbod</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Veel gestelde vragen</a></li>
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
        <form method="post" action="carSelection.php" enctype="multipart/form-data">
            <label class="boxTitle">Auto toevoegen</label>

            <br>

            <div class="fullWidthBox">
                <label for="addKenteken">Ophaal locatie:</label><br>
                <select id="selectionType">
                    <option>Almere</option>
                </select>
            </div>

            <br>

            <div class="kenteken">
                <label for="addKenteken">Ophaal datum:</label><br>
                <input type="date" id="kenteken" name="addKenteken"><br>
            </div>

            <div class="carImage">
                <label for="image">Ophaaltijd:</label><br>
                <input type="time" id="kenteken" name="image" accept="image/*">
            </div>

            <br>

            <div class="kenteken">
                <label for="addKenteken">Retourdatum:</label><br>
                <input type="date" id="kenteken" name="addKenteken"><br>
            </div>

            <div class="carImage">
                <label for="image">Retourtijd:</label><br>
                <input type="time" id="kenteken" name="addKenteken"><br>
            </div>

            <button class="addButton">Toevoegen</button>
        </form>
    </div>
</body>
</html>
