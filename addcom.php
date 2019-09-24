<?php 

include "mysqliconnection.php";
include "model/settings.php";

$db = ConnectDB($servername, $password, $username, $dbname);

if (isset($_POST['submit'])) {
    AddComp($db, $_POST);
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/addcom.css">
    <title>Document</title>
</head>
<body>


<header>

    <h1>stage</h1>

    <ul>
        <li><a href="index.php">componenten</a></li>
        <li><a href="updatelist.php">update list</a></li>
        <li class="add"><a href="index.php"><i class="fas fa-backspace"></i></a></li>
    </ul>

</header>

<div class="gradient">

    <main>

    <h1>Component toevoegen</h1>

    <form action="" method="post">

    <label for="namecom">Naam component</label><br>
    <input type="text" name="namecom" id="namecom"><br>

    <label for="hoeveelheid">Hoeveelheid</label><br>
    <input type="number" name="hoeveelheid" id="hoeveelheid"><br>

    <label for="maximum">max. Hoeveelheid</label><br>
    <input type="number" name="maximum" id="maximum"><br>

    <button type="submit" name="submit" class="add">Add <i class="fas fa-plus"></i></button>

    </form>

    </main>

</div>

<footer>
    <p> &copy; Da vinci college <script>document.write(new Date().getFullYear());</script> | @marcospaans</p>
</footer>
    
</body>
<script src="https://kit.fontawesome.com/5cccb1eff3.js"></script>
</html>