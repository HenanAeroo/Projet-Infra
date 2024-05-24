<?php

require_once "db_config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_log("Connected successfully");
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
}

?>