<?php

$id = intval($_GET['Personeelsnummer']);

if ($id == 0) {
    header('location: index.php?page=personeel');
}

$sql = "DELETE FROM personeelgegevens WHERE Personeelsnummer = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
header('location: index.php?page=personeel');
?>