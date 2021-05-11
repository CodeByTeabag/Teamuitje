<?php
require_once('db.php');
require_once('page-layout/header.php');

$error = [];
if (isset($_POST['submit'])) {
    if (isset($_POST['personeelsnummer']) && $_POST['personeelsnummer'] == '') {
        $error['personeelsnummer'] = 'Personeelsnummer is nog niet ingevuld!';
    }

    if (isset($_POST['voorletters']) && $_POST['voorletters'] == '') {
        $error['voorletters'] = 'Voorletter is nog niet ingevuld!';
    }

    if (isset($_POST['tussenvoegsel']) && $_POST['tussenvoegsel'] == '') {
        $error['tussenvoegsel'] = 'Tussenvoegsel is nog niet ingevuld!';
    }

    if (isset($_POST['achternaam']) && $_POST['achternaam'] == '') {
        $error['achternaam'] = 'Achternaam is nog niet ingevuld!';
    }

    if (isset($_POST['email']) && $_POST['email'] == '') {
        $error['email'] = 'Email is nog niet ingevuld!';
    }

    if (isset($_POST['voucher']) && $_POST['voucher'] == '') {
        $error['voucher'] = 'Voucher is nog niet ingevuld!';
    }

    if (count($error) == 0) {
        $sql = "INSERT INTO personeelgegevens (personeelsnummer, voorletters, tussenvoegsel, achternaam, email, voucher) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_POST['personeelsnummer'],
            $_POST['voorletters'],
            $_POST['tussenvoegsel'],
            $_POST['achternaam'],
            $_POST['email'],
            $_POST['voucher'],
        ]);
        header('location: index.php?page=personeel');
    }
}

?>
<div class="container centerBox padding">
    <form method="post">
        <div class="form-group">
            <h1>CREATE</h1>
            <label for="personeelsnummer">
                <h5>Personeelsnummer</h5>
            </label>
            <input name="personeelsnummer" value="<?php echo (isset($_POST['personeelsnummer']) ? $_POST['personeelsnummer'] : ''); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Voer hier het personeelsnummer in">
            <?php echo (isset($error['personeelsnummer']) ? $error['personeelsnummer'] : ''); ?>
        </div>
        <div class="form-group">
            <label for="voorletters">
                <h5>Voornaam</h5>
            </label>
            <input name="voorletters" value="<?php echo (isset($_POST['voorletters']) ? $_POST['voorletters'] : ''); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Voer hier de voorletters in">
            <?php echo (isset($error['voorletters']) ? $error['voorletters'] : ''); ?>
        </div>
        <div class="form-group">
            <label for="tussenvoegsel">
                <h5>Tussenvoegsel</h5>
            </label>
            <input name="tussenvoegsel" value="<?php echo (isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : ''); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voer hier het tussenvoegsel in">
            <?php echo (isset($error['tussenvoegsel']) ? $error['tussenvoegsel'] : ''); ?>
        </div>
        <div class="form-group">
            <label for="achternaam">
                <h5>Achternaam</h5>
            </label>
            <input name="achternaam" value="<?php echo (isset($_POST['achternaam']) ? $_POST['achternaam'] : ''); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voer hier de achternaam in">
            <?php echo (isset($error['achternaam']) ? $error['achternaam'] : ''); ?>
        </div>
        <div class="form-group">
            <label for="email">
                <h5>Email</h5>
            </label>
            <input name="email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : ''); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voer hier het email adres in">
            <?php echo (isset($error['email']) ? $error['email'] : ''); ?>
        </div>
        <div class="form-group">
            <label for="voucher">
                <h5>Voucher</h5>
            </label>
            <input name="voucher" value="<?php echo (isset($_POST['voucher']) ? $_POST['voucher'] : ''); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voer hier de voucher code in">
            <?php echo (isset($error['voucher']) ? $error['voucher'] : ''); ?>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
require_once('page-layout/footer.php');
?>
