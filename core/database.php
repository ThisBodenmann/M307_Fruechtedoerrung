<?php 
function connectToDatabase()
{
    try {
        return new PDO('mysql:host=127.0.0.1;dbname=kurseictbz_30706', 'kurseictbz_30706', 'db_307_pw_06', [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]);
    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }
}
?>