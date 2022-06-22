<?php
session_start();

// DB connection
$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

// Get ID
$id = $_SESSION['id'];

// Select Data
$query = "SELECT foto FROM auto WHERE kenteken = '$id'";
$result = mysqli_query($mysqli, $query) or die("Error with query");

while ($row = mysqli_fetch_array($result)) {
    $foto = $row['foto'];

    echo '<div class="whiteBox">
    <form method="post" action="pushImage.php" enctype="multipart/form-data">
                <label class="boxTitle">Auto toevoegen</label>
                
                <br>
                
                <div class="carImageEdit">
                <label for="image">Auto foto:</label><br>
                <img class= "imageCarEdit" src="' . $foto . '"/>
                
                <br>
                
                <input type="file" id="image" name="image" accept="image/*" value=' . $foto . '>
                
                <td><button class="addButton" type="submit" name="submit">Submit</button></td>
    </div>
';}
?>