<?php

try {

    $host = 'localhost';
    $dbname = 'sepet_sistemi';
    $user = 'root';
    $password = '';

    $db = new PDO("mysql:host=$host;dbname=$dbname; charset=utf8mb4;", "$user", "$password");

}catch(PDOException $mesaj){

    echo $mesaj -> getMessage();

}