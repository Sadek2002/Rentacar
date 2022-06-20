<?php
session_start();

$ophaaldatum = $_POST['addOphaaldatum'];
$ophaaltijd = $_POST['addOphaaltijd'];
$retourdatum = $_POST['addRetourdatum'];
$retourtijd = $_POST['addRetourtijd'];

$mysqli = new mysqli('localhost', 'root', '', 'rentacar') or die('Error connecting');

$mysqli->autocommit(FALSE);

$query = $mysqli->prepare("INSERT INTO reservering VALUES (0,?,?,?,?,?,?)");
$query2 = $mysqli->prepare("SELECT LAST_INSERT_ID()");

$query->bind_param('ssssss',$ophaaldatum, $ophaaltijd, $retourdatum, $retourtijd, $auto_id, $klant_id) or die('Error binding params');
$query->execute() or die('Error executing');
$query2->execute() or die('Error executing');
$query2->store_result();
$query2->bind_result($result);
$mysqli->autocommit(TRUE);

while ($query2->fetch()) {
    echo $result;
}

$query2->free_result();
$query2->close();

$_SESSION['name'] = $result;

header('Location: carSelection.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
</body>
</html>

