<?php
include 'db.php';
$result = $conn->query("SELECT * FROM directory ORDER BY id DESC");

$output = '';
while ($row = $result->fetch_assoc()) {
  $id = $row['id'];
  $name = htmlspecialchars($row['name']);
  $email = htmlspecialchars($row['email']);
  $phone = htmlspecialchars($row['phone']);

  $output .= "
  <div class='col-md-4'>
    <div class='card shadow-sm p-3 mb-3 rounded-4'>
      <h5 class='card-title fw-semibold'>{$name}</h5>
      <p class='mb-1'><i class='bi bi-envelope me-1'></i>{$email}</p>
      <p class='mb-2'><i class='bi bi-telephone me-1'></i>{$phone}</p>
      <button class='btn btn-sm btn-outline-primary me-2' onclick='editEntry({$id}, \"{$name}\", \"{$email}\", \"{$phone}\")'>
        <i class='bi bi-pencil-square'></i> Edit
      </button>
      <button class='btn btn-sm btn-outline-danger' onclick='deleteEntry({$id})'>
        <i class='bi bi-trash'></i> Delete
      </button>
    </div>
  </div>";
}
echo $output;
?>
