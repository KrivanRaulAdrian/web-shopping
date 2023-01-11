<?php

$host = 'localhost';
$dbname = 'web_shop';
$username = 'root';
$password = 'root';

try {
    return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
