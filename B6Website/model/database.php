<?php
    # Connects to the database
    class DBConnect {
        private static $me;

        public static function makeConnector() {
            if (!isset(self::$me)) self::$me = new DBConnect();         
            return self::$me;
        } //makeConnector

        public function connect() {
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dsn = "mysql:host:localhost;dbname=ecinemab6";

            try {
                global $db;
                $db = new PDO($dsn, $username, $password);
                $use = "USE ecinemab6";
                $db->exec($use);   # main variable 
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
            } //try
        } //connect

    } //DBConnect
?>