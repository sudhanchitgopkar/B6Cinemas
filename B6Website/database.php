<?php
    $dsn = 'mysql:host=localhost;dbname=ecinemab6';
    $username = 'root';
    $password = '';

    // Error handling
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo  '<p> Unable to connect to the database: '.$error;
        exit();
    }

?>