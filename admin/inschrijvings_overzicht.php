<?php
require_once('db.php');
$page = 'inschrijvings_overzicht';
require_once('page-layout/header.php');

$sql = "SELECT * FROM inschrijving";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="inschrijf-overzicht-container">
    <?php

    foreach ($result as $res) { ?>
        <div class="container">
            <hr>
            <h3><?php echo "Personeel" . " " . $res['personeels_id'] . " " . "staat ingeschreven op activiteit:" . " " . $res['activiteit_id']; ?></h3>
            <a class="btn btn-primary" id="deleteButton" href="index.php?page=inschrijving-delete&activiteit_id=<?php echo $res['activiteit_id']; ?>">Delete</a>
            <hr>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($result['personeels_id']) != empty($result)) {
    ?>
        <h3 style="text-align: center;"> <?php echo "Momenteel is er geen personeel dat zich ingeschreven heeft"; ?></h3>
    <?php
    }
    ?>
</div>
<?
include('page-layout/footer.php');
?>