<?php

include "mysqliconnection.php";
include "model/settings.php";
include "model/PHPMailer.php";

$db = ConnectDB($servername, $password, $username, $dbname);

$data = GetCompByID($db, $_GET['id']);

if (isset($_POST['submit'])) {
    
    $naam_comp = $data[0]['naam_comp'];
    $total = $_POST['hoeveelheid'] - $data[0]['hoeveelheid'];
    AddUpdate($db, $_POST, $naam_comp, $total);
    
    //ChangeComp($db, $_POST, $_GET['id']);
    SentEmail();
    
    //header('Location: index.php');
    //exit;
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
        <li class="add"><a href="index.php"><i class="fas fa-backspace"></i></i></a></li>
    </ul>

</header>

<div class="gradient">

    <main>

    <h1>Component bijvoegen/afnemen</h1>

    <form action="" method="post">

    <label for="studentennummer">studentennummer</label><br>
    <input type="text" name="studentennummer" id="studentennummer" maxlength="8" pattern="[0-9]{8}" placeholder="00000000" required ><br>

    <label for="hoeveelheid">Hoeveelheid</label><br>
    <input type="number" name="hoeveelheid" id="hoeveelheid" value="<?= $data[0]['hoeveelheid'] ?>"><br>

    <button type="submit" name="submit" class="change">bijvoegen / afnemen <i class="fas fa-save"></i></button>

    </form>

    </main>

</div>

<footer>
    <p> &copy; Da vinci college <script>document.write(new Date().getFullYear());</script> | @marcospaans</p>
</footer>
    
</body>
<script src="https://kit.fontawesome.com/5cccb1eff3.js"></script>
</html>