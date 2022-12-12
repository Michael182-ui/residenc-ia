<?php 
    $server = 'localhost';
    $userName = 'root';
    $password = '';
    $database = 'php_login_database';

    try{
        $conn = new PDO("mysql:host=$server; dbname=$database;",$userName,$password);
    }catch(PDOException $error){
        die('conexion fallida: '.$error -> getMessage());
    }
?>