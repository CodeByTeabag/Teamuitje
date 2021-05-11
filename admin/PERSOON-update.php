<?php
include_once('page-layout/header.php');

$id = intval($_GET['Personeelsnummer']);

// 
if ($id == 0) {
    header('location: index.php?page=personeel');
}
$sql = "SELECT * FROM personeelgegevens WHERE Personeelsnummer = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$result = $stmt->fetchAll();

$error = [];
if (isset($_POST['submit'])) {
    if (isset($_POST['personeelsnummer']) && $_POST['personeelsnummer'] == '') {
        $error['personeelsnummer'] = 'Personeelsnummer naam is nog niet ingevuld!';
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
        $sql = "UPDATE personeelgegevens SET personeelsnummer = ?, voorletters = ?, tussenvoegsel = ?, achternaam = ?, email = ?, voucher = ? WHERE Personeelsnummer = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_POST['personeelsnummer'],
            $_POST['voorletters'],
            $_POST['tussenvoegsel'],
            $_POST['achternaam'],
            $_POST['email'],
            $_POST['voucher'],
            $id
        ]);
        header('location: index.php?page=personeel');
    }
}

?>
<div class="container centerBox padding">
    <form method="post">
        <div class="form-group">
            <h1>EDIT</h1>
            <h5>Personeelsnummer</h5>
            <input name="personeelsnummer" value="<?php echo (isset($_POST['personeelsnummer']) ? $_POST['personeelsnummer'] : ($result[0]['Personeelsnummer'])); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Voer hier het personeelsnummer in">
            <?php echo (isset($error['personeelsnummer']) ? $error['personeelsnummer'] : ''); ?>
        </div>
        <div class="form-group">
            <label for="voorletters">
                <h5>Voornaam</h5>
            </label>
            <input name="voorletters" value="<?php echo (isset($_POST['voorletters']) ? $_POST['voorletters'] : ($result[0]['Voorletters'])); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Voer hier de voorletters in">
            <?php echo (isset($error['voorletters']) ? $error['voorletters'] : ''); ?>
        </div>
        <div class="form-group">
            <h5>Tussenvoegsel</h5>
            <input name="tussenvoegsel" value="<?php echo (isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : ($result[0]['Tussenvoegsel'])); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voer hier het tussenvoegsel in">
            <?php echo (isset($error['tussenvoegsel']) ? $error['tussenvoegsel'] : ''); ?>
        </div>
        <div class="form-group">
            <h5>Achternaam</h5>
            <input name="achternaam" value="<?php echo (isset($_POST['achternaam']) ? $_POST['achternaam'] : ($result[0]['Achternaam'])); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voer hier de achternaam in">
            <?php echo (isset($error['achternaam']) ? $error['achternaam'] : ''); ?>
        </div>
        <div class="form-group">
            <h5>Eindtijd</h5>
            <input name="email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : ($result[0]['Email'])); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voer hier het email adres in">
            <?php echo (isset($error['email']) ? $error['email'] : ''); ?>
        </div>
        <div class="form-group">
            <h5>Aantal</h5>
            <input name="voucher" value="<?php echo (isset($_POST['voucher']) ? $_POST['voucher'] : ($result[0]['Voucher'])); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Voer hier de voucher code in">
            <?php echo (isset($error['voucher']) ? $error['voucher'] : ''); ?>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
include_once('page-layout/footer.php');
?>