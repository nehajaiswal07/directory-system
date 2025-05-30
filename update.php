<?php
include 'db.php';

$id = $_POST['id'] ?? 0;
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';

if ($id && $name && $email && $phone) {
  $stmt = $conn->prepare("UPDATE directory SET name = ?, email = ?, phone = ? WHERE id = ?");
  $stmt->bind_param("sssi", $name, $email, $phone, $id);
  $stmt->execute();
}
?>
