<?php
$servername = "127.0.0.1";
$username = "davydebr_id_rsa";
$password = "J!Q!M,yR?-s8";

try {
    $conn = new PDO("mysql:host=$servername;dbname=teamuitje", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>