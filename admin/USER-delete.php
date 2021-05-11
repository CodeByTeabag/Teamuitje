<?php

$id = intval($_GET['id']);

if ($id == 0) {
    header('location: index.php?page=amdin');
}

$sql = "DELETE FROM login_admin WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
header('location: index.php?page=admin');
?>