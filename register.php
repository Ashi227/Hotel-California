<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic validation
    if (empty($full_name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, algo: PASSWORD_DEFAULT);

    // Insert into database
    try {
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$full_name, $email, $hashed_password]);
        echo "Registration successful!";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Email already exists.";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>