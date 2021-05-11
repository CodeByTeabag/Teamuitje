<?php


$id = intval($_GET['activiteit_id']);

//Checkt of de integer van activiteit id wel gelijk is aan 0 of niet
if ($id == 0) {
    header('location: index.php?page=inschrijvings_overzicht');
}

$sql = "DELETE FROM inschrijving WHERE activiteit_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
header('location: index.php?page=inschrijvings_overzicht');
?>