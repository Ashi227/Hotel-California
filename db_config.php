<?php
$host = "localhost";        // or your server name
$dbname = "aurum_suites";   // your database name
$username = "root";         // your MySQL username
$password = "";             // your MySQL password (often empty for localhost)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>