<?php
session_start();
include("db_connect.php");

if (!isset($_SESSION['user_id'])) {
  header("Location: index.html");
  exit();
}

$user_id = $_SESSION['user_id'];
$location = $_POST['location'];
$checkin = $_POST['checkin_date'];
$nights = $_POST['nights'];

$stmt = $conn->prepare("INSERT INTO bookings (user_id, location, checkin_date, nights) VALUES (?, ?, ?, ?)");
$stmt->bind_param("issi", $user_id, $location, $checkin, $nights);

if ($stmt->execute()) {
  echo "<script>alert('✅ Booking successful!'); window.location='dashboard.php';</script>";
} else {
  echo "<script>alert('❌ Booking failed.'); window.history.back();</script>";
}
?>
