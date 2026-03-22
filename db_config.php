<?php
$host = "localhost";        // your server name
$dbname = "aurum_suites";   // database name
$username = "root";         // MySQL username
$password = "";             // MySQL password (often empty for localhost)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
