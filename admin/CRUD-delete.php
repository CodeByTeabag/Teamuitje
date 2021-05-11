<?php
ob_start();

$id = intval($_GET['id']);

if ($id == 0) {
    header('location: index.php?page=activiteiten');
}

$sql = "DELETE FROM activiteiten WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
header('location: index.php?page=activiteiten');
?>