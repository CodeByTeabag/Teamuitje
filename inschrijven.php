<?php
session_start();
include('db.php');
include('page-layout/header.php');
?>

<div class="middle-container">
<a class="btn btn-primary m-2" id="createButton" href="activiteiten.php">Terug</a>
    <?php
   
   if (!isset($_SESSION['user_id'])) {
        header('location: login.php');
    }

    $id = intval($_GET['id']);
    

    if ($id == 0) {
        echo 'Opgevraagde activiteit bestaat niet.';
        //exit;
    } 
    else 
    {
        $sql = "SELECT * FROM inschrijving WHERE activiteit_id = ? AND personeels_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id, $_SESSION['user_id']]);
        $result = $stmt->fetchAll();
        if (count($result) > 0) {
            echo "Je bent al ingeschreven!";
            exit;
        }

        $sql = "SELECT 
                activiteiten.id as activiteit_id,
                activiteiten.Naam as activiteit_naam,
                activiteiten.Deadline as activiteit_deadline,
                activiteiten.Aantal as activiteit_aantal,
                count(inschrijving.personeels_id) as inschrijving_totaal 
                FROM activiteiten
                INNER JOIN inschrijving ON activiteiten.id = inschrijving.activiteit_id
                WHERE activiteiten.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        // Max aantal inschrijvingen vergeleken met het totaal aantal inschrijvingen
        if (intval($result[0]['inschrijving_totaal']) >= intval($result[0]['activiteit_aantal'])) { 
            echo 'Deze activiteit zit al vol!';
            exit;
        }
        
        $sql = "INSERT INTO inschrijving (personeels_id, activiteit_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_SESSION['user_id'], $id]);
        $message = 'Je bent ingeschreven voor het volgende: ' . $result[0]['activiteit_naam'] . '';
        echo $message;
    }
    ?>

</div>
<?php
include('page-layout/footer.php');
?>