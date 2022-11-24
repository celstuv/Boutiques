<?php

$servername = 'localhost';
$login = "root";
$password = "";

//method1
try {
    $pdo = new PDO('mysql:host=localhost;dbname=meubles', $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    //echo "Connectée 😁 ! <br><br>";
} catch (PDOException $e) {
    //echo $e->getMessage() . " 😥😌 Essaye encore !";
}
?>