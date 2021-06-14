<?php
    class Database {
        static $db;
        public static function getConnection(){
            if (Database::$db != NULL) {
                return Database::$db;
            } else {
                Database::$db = mysqli_connect("localhost", "root" ,'', 'birth');
                if (!Database::$db) {
                    die("Connection failed: ".mysqli_connect_error());
                } else {
                    return Database::$db;
                }
            }
        }
        
    }
?>