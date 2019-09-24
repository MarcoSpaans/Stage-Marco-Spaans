<?php

include "mysqliconnection.php";
include "model/settings.php";

$db = ConnectDB($servername, $password, $username, $dbname);

$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$getallcomp = GetAllComp($db, $start, $limit);

$getamountrows = CountRow($db);
$total = count($getamountrows);
$pages = ceil( $total / $limit );

$next = $page + 1;
$previous = $page - 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/com.css">
    <title>Document</title>
</head>
<body>

<header>

    <h1>stage</h1>

    <ul>
        <li><a href="" class="active_menu">componenten</a></li>
        <li><a href="updatelist.php">update list</a></li>
        <li class="add"><a href="addcom.php"><i class="fas fa-plus-square"></i></a></li>
    </ul>

</header>

<div class="gradient">
    
    <main>
        
        <h1>Componenten</h1>
        
        <table>
            
            <thead>
                
                <tr>
                    
                    <th>Naam component</th>
                    <th>hoeveelheid</th>
                    <th>maximaal op voorraad</th>
                    <th></th>
                    <th></th>
                    
                </tr>
                
            </thead>
            
            
            <tbody>

            <?php 
            
            foreach ($getallcomp as $value) {

                ?>
                
                <tr>
                    
                    <td><?= $value['naam_comp'] ?></td>
                    <td><?= $value['hoeveelheid'] ?></td>
                    <td><?= $value['maximum'] ?></td>
                    <td><a class="change" href="changecom.php?id=<?= $value['id'] ?>"><i class="fas fa-percentage fa-2x"></i></a></td>
                    <td><a class="delete" href="deletecom.php?id=<?= $value['id'] ?>"><i class="far fa-trash-alt fa-2x"></i></a></td>
                    
                </tr>
            
            <?php 
            
        }
            
            ?>


        </tbody>
        
    </table>
    
    <div class="center">
        
        <div class="pagination">
            <a href="<?php 
            
            if ($previous >= 1) {
                ?>
                index.php?page=<?= $previous ?>
                <?php
            }
            
            ?>">&laquo;</a>
            
            <?php 
            
            for ($i = 1; $i <= $pages; $i++) {

                ?>

                <a href="index.php?page=<?= $i ?>"><?= $i ?></a>

                <?php

            }
            
            ?>

            <a href="index.php?page=<?= $next ?>">&raquo;</a>
        </div>
    </div>
    
</main>

</div>

    <footer>
        <p> &copy; Da vinci college <script>document.write(new Date().getFullYear());</script> | @marcospaans</p>
    </footer>
    
</body>
<script src="https://kit.fontawesome.com/5cccb1eff3.js"></script>
</html>