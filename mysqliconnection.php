<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "stage";

if ($_SERVER["HTTP_HOST"] == 'www.marcospaans.nl') {
    
    $servername = "ID88510_marco.db.webhosting.be";
    $username = "ID88510_marco";
    $password = "sdjklfsdjKL24E";
    $dbname = "ID88510_marco";

}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?> 