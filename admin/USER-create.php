<?php
require_once('page-layout/header.php');

$error = [];
if (isset($_POST['submit'])) {
    if (isset($_POST['gebruikersnaam']) && $_POST['gebruikersnaam'] == '') {
        $error['gebruikersnaam'] = 'Gebruikersnaam is nog niet ingevuld!';
    }

    if (isset($_POST['wachtwoord']) && $_POST['wachtwoord'] == '') {
        $error['wachtwoord'] = 'Wachtwoord is nog niet ingevuld!';
    }


    // $new_pass = $_GET['wachtwoord'];
    // $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);

// var_dump($_POST['gebruikersnaam']);
// var_dump($_POST['wachtwoord']);

    if (count($error) == 0) {
        $sql = "INSERT INTO login_admin (gebruikersnaam, wachtwoord) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_POST['gebruikersnaam'], 
            $_POST['wachtwoord'] 
        ]);
        header('location: index.php?page=admin');
    }
}

?>
<div class="container centerBox padding">
    <form method="post">
    <h1>CREATE</h1>
        <div class="form-group">
            <label for="gebruikersnaam">
                <h5>Gebruikersnaam</h5>
            </label>
            <input name="gebruikersnaam" value="<?php echo (isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : ''); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Voer hier het gebruikersnaam in">
            <?php echo (isset($error['gebruikersnaam']) ? $error['gebruikersnaam'] : ''); ?>
        </div>
        <div class="form-group">
            <label for="wachtwoord">
                <h5>wachtwoord</h5>
            </label>
            <input name="wachtwoord" value="<?php echo (isset($_POST['wachtwoord']) ? $_POST['wachtwoords'] : ''); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Voer hier de hash code in">
            <?php echo (isset($error['wachtwoord']) ? $error['wachtwoord'] : ''); ?>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
require_once('page-layout/footer.php');
?>
