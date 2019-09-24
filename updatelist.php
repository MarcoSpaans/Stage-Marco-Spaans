<?php 

include "mysqliconnection.php";
include "model/settings.php";

$db = ConnectDB($servername, $password, $username, $dbname);

$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$getallupdates = GetAllUpdates($db, $start, $limit);

$getamountrows = CountRowUpdate($db);
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
    <link rel="stylesheet" href="css/update.css">
    <title>Document</title>
</head>
<body>

<header>

    <h1>stage</h1>

    <ul>
        <li><a href="index.php">componenten</a></li>
        <li><a href="" class="active_menu">update list</a></li>
    </ul>

</header>

<div class="gradient">
    
    <main>
        
        <h1>Update List</h1>
        
        <table>
            
            <thead>
                
                <tr>
                    
                    <th>studenten nummer</th>
                    <th>naam component</th>
                    <th>toegevoegd/afgenomen</th>
                    <th>totaal op voorraad</th>
                    <th>tijd van update</th>
                    <th></th>
                
                </tr>
            
            </thead>
        
        
            <tbody>

            <?php 
            
            foreach ($getallupdates as $value) {
            
            ?>
            
                <tr>
                
                    <td><?= $value['student_numb'] ?></td>
                    <td><?= $value['naam_comp'] ?></td>
                    <td><?= $value['given_taken'] ?></td>
                    <td><?= $value['total_in_stock'] ?></td>
                    <td><?= $value['time_of_update'] ?></td>
                    <td><a class="delete" href="deleteupdate.php?id=<?= $value['id'] ?>"><i class="far fa-trash-alt fa-2x"></i></a></td>
                
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
                updatelist.php?page=<?= $previous ?>
                <?php
            }
            
            ?>">&laquo;</a>

                <?php 
            
                for ($i = 1; $i <= $pages; $i++) {

                ?>

                    <a href="updatelist.php?page=<?= $i ?>"><?= $i ?></a>

                <?php

                }
            
                ?>

                <a href="updatelist.php?page=<?= $next ?>">&raquo;</a>
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