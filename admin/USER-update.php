<?php
include_once('page-layout/header.php');

$id = intval($_GET['id']);

if ($id == 0) {
    header('location: index.php?page=admin');
}
$sql = "SELECT * FROM login_admin WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$result = $stmt->fetchAll();

$error = [];
if (isset($_POST['submit'])) {
    if (isset($_POST['gebruikersnaam']) && $_POST['gebruikersnaam'] == '') {
        $error['gebruikersnaam'] = 'Gebruikersnaam is nog niet ingevuld!';
    }

    if (isset($_POST['wachtwoord']) && $_POST['wachtwoord'] == '') {
        $error['wachtwoord'] = 'Wachtwoord is nog niet ingevuld!';
    }


    if (count($error) == 0) {
        $sql = "UPDATE login_admin SET gebruikersnaam = ?, wachtwoord = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_POST['gebruikersnaam'],
            $_POST['wachtwoord'],
            $id
        ]);
        header('location: index.php?page=admin');
    }
}

?>
<div class="container centerBox padding">
    <form method="post">
        <div class="form-group">
            <h1>EDIT</h1>
            <h5>Personeelsnummer</h5>
            <input name="gebruikersnaam" value="<?php echo (isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : ($result[0]['gebruikersnaam'])); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Voer hier het gebruikersnaam in">
            <?php echo (isset($error['gebruikersnaam']) ? $error['gebruikersnaam'] : ''); ?>
        </div>
        <div class="form-group">
            <label for="wachtwoord">
                <h5>Wachtwoord</h5>
            </label>
            <input name="wachtwoord" value="<?php echo (isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : ($result[0]['wachtwoord'])); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Voer hier het wachtwoord in">
            <?php echo (isset($error['wachtwoord']) ? $error['wachtwoord'] : ''); ?>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
include_once('page-layout/footer.php');
?>