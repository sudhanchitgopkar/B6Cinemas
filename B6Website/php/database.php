<?php
    # Connects to the database

    $servername = "localhost";
    $username = "root";
    $password = "";

    $dsn = "mysql:host:localhost;dbname=ecinemab6";

    try {
        $db = new PDO($dsn, $username, $password);
        $use = "USE ecinemab6";
        $db->exec($use);   # main variable 
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
    }
?>