<?php 

include "mysqliconnection.php";
include "model/settings.php";

$db = ConnectDB($servername, $password, $username, $dbname);

if (isset($_POST['delete'])) {
    DeleteUpdate($db, $_GET['id']);
    header('Location: updatelist.php');
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
        <li class="add"><a href="index.php"><i class="fas fa-backspace"></i></i></a></li>
    </ul>

</header>

<div class="gradient">

    <main>

        <h1>Update Verwijderen</h1>

        <form action="" method="post">

            <h2>Wilt u deze update verwijderen?</h2>

            <button type="submit" name="delete" class="delete">Verwijderen <i class="fas fa-trash"></i></button>
            <a href="index.php"><button class="change">Annuleren <i class="fas fa-window-close"></i></button></a>
        </form>

    </main>

</div>

<footer>
    <p> &copy; Da vinci college <script>document.write(new Date().getFullYear());</script> | @marcospaans</p>
</footer>
    
</body>
<script src="https://kit.fontawesome.com/5cccb1eff3.js"></script>
</html>