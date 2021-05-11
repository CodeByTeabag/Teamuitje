<?php
include('page-layout/header.php');

$id = intval($_GET['id']);
if ($id == 0) {
    header('location: index.php?page=activiteiten');
}
$sql = "SELECT * FROM activiteiten WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$result = $stmt->fetchAll();

$error = [];
if (isset($_POST['submit'])) {
    if (isset($_POST['naam']) && $_POST['naam'] == '') {
        $error['naam'] = 'Activiteit naam is nog niet ingevuld!';
    }

    if (isset($_POST['omschrijving']) && $_POST['omschrijving'] == '') {
        $error['omschrijving'] = 'Omschrijving is nog niet ingevuld!';
    }

    if (isset($_POST['locatie']) && $_POST['locatie'] == '') {
        $error['locatie'] = 'Locatie is nog niet ingevuld!';
    }

    if (isset($_POST['begintijd']) && $_POST['begintijd'] == '') {
        $error['begintijd'] = 'Begintijd is nog niet ingevuld!';
    }

    if (isset($_POST['eindtijd']) && $_POST['eindtijd'] == '') {
        $error['eindtijd'] = 'Eindtijd is nog niet ingevuld!';
    }

    if (isset($_POST['aantal']) && $_POST['aantal'] == '') {
        $error['aantal'] = 'Het aantal deelnemers is nog niet ingevuld!';
    }

    if (isset($_POST['deadline']) && $_POST['deadline'] == '') {
        $error['deadline'] = 'De deadline is nog niet ingevuld!';
    }

    if (count($error) == 0) {
        $sql = "UPDATE activiteiten SET naam = ?, omschrijving = ?, locatie = ?, begintijd = ?, eindtijd = ?, aantal = ?, deadline = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_POST['naam'],
            $_POST['omschrijving'],
            $_POST['locatie'],
            $_POST['begintijd'],
            $_POST['eindtijd'],
            $_POST['aantal'],
            $_POST['deadline'],
            $id
        ]);
        header('location: index.php?page=activiteiten');
    }
}

?>
<div class="container centerBox padding">
    <form method="post">
        <div class="form-group">
            <h1>EDIT</h1>
            <h5>Activiteit naam</h5>
            <input name="naam" value="<?php echo (isset($_POST['naam']) ? $_POST['naam'] : ($result[0]['Naam'])); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Voor hier de activiteit naam in">
            <?php echo (isset($error['naam']) ? $error['naam'] : ''); ?>
        </div>
        <div class="form-group">
            <h5>Beschrijving</h5>
            <textarea name="omschrijving" rows="4" cols="50" placeholder="Vul hier je omschrijving in.."><?php echo (isset($_POST['omschrijving']) ? $_POST['omschrijving'] : ($result[0]['Omschrijving'])); ?></textarea>
            <?php echo (isset($error['omschrijving']) ? $error['omschrijving'] : ''); ?>
        </div>
        <div class="form-group">
            <h5>Locatie</h5>
            <input name="locatie" value="<?php echo (isset($_POST['locatie']) ? $_POST['locatie'] : ($result[0]['Locatie'])); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voor hier de locatie in">
            <?php echo (isset($error['locatie']) ? $error['locatie'] : ''); ?>
        </div>
        <div class="form-group">
            <h5>Begintijd</h5>
            <input name="begintijd" value="<?php echo (isset($_POST['begintijd']) ? $_POST['begintijd'] : ($result[0]['Begintijd'])); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voor hier de begintijd in">
            <?php echo (isset($error['begintijd']) ? $error['begintijd'] : ''); ?>
        </div>
        <div class="form-group">
            <h5>Eindtijd</h5>
            <input name="eindtijd" value="<?php echo (isset($_POST['eindtijd']) ? $_POST['eindtijd'] : ($result[0]['Eindtijd'])); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voor hier de eindtijd in">
            <?php echo (isset($error['eindtijd']) ? $error['eindtijd'] : ''); ?>
        </div>
        <div class="form-group">
            <h5>Aantal</h5>
            <input name="aantal" value="<?php echo (isset($_POST['aantal']) ? $_POST['aantal'] : ($result[0]['Aantal'])); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voor hier het aantal personen in">
            <?php echo (isset($error['aantal']) ? $error['aantal'] : ''); ?>
        </div>
        <div class="form-group">
            <h5>Datum Jaar / Maand / Dag</h5>
            <input name="deadline" value="<?php echo (isset($_POST['deadline']) ? $_POST['deadline'] : ($result[0]['Deadline'])); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voor hier de deadline in">
            <?php echo (isset($error['deadline']) ? $error['deadline'] : ''); ?>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
include_once('page-layout/footer.php');
?>