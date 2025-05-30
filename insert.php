<?php
include 'db.php';

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';

if ($name && $email && $phone) {
  $stmt = $conn->prepare("INSERT INTO directory (name, email, phone) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $phone);
  $stmt->execute();
}
?>
