<?php
include('db.php');
include('page-layout/header.php');

$error = [];

if (isset($_POST['submit'])) {
   //if (count($error) == 0) {
   // Sessions die gehashed worden
   $sql = "SELECT * FROM personeelgegevens WHERE Personeelsnummer = :user_id AND Voucher = :voucher";
   $stmt = $conn->prepare($sql);
   $stmt->execute([":user_id" => $_POST["personeelsnummer"], ":voucher" => $_POST['voucher']]);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($result > 0) {
      $_SESSION["user_id"] = $result['Personeelsnummer'];
      $_SESSION["voucher"] = $result['Voucher'];
      $_SESSION["voorletter"] = $result["Voorletters"];
      $_SESSION["tussenvoegsel"] = $result["Tussenvoegsel"];
      $_SESSION["achternaam"] = $result["Achternaam"];
      //if (count($result) == $result["Personeelsnummer"] || $result["Voucher"]) {
         header('Location: activiteiten.php');
      //}
   } else {
      $error['personeelsnummer'] = "Personeelsnummer komt niet overeen!";
      $error['voucher'] = "Voucher komt niet overeen!";
   }

   $sql = "SELECT Personeelsnummer, Voucher FROM personeelgegevens";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $gegevens = $stmt->fetchAll();

   $personeelsnummer = (isset($gegevens['Personeelsnummer']));

   $voucher = (isset($gegevens['Voucher']));

   // if ($_POST['personeelsnummer'] != $personeelsnummer) {

   // }
   // if ($_POST['voucher'] != $voucher) {

   // }
   //}
}

?>
<div class="blue-fade-bg">
   <div class="container contact-box">
      <form id="login-form login-box" class="form col-md-6" onsubmit="return errorValidate()" method="post">
         <h3 class="text-center text-info">Login</h3>
         <div class="form-group">
            <h5 class="text-info">Gebruikersnaam</h5>
            <input type="text" name="personeelsnummer" class="form-control" id="userInput">
            <?php
            if (isset($_POST['personeelsnummer'])) { ?>
               <h6 class="errorMessage"><?php echo $error['personeelsnummer']; ?></h6>
            <?php
            }
            ?>
            <h6 class="errorMessage" id="username"></h6>
         </div>
         <div class="form-group">
            <h5 class="text-info">Wachtwoord</h5>
            <input type="password" name="voucher" class="form-control" id="passInput">
            <?php
            if (isset($_POST['voucher'])) { ?>
               <h6 class="errorMessage"><?php echo $error['voucher']; ?></h6>
            <?php
            }
            ?>
            <h6 class="errorMessage" id="passwordError"></h6>
         </div>
         <div class="form-group">
            <input type="submit" name="submit" value="Login" class="btn btn-info btn-md">
            <a href="admin/login.php">
               <input type="button" value="Admin" class="btn btn-info btn-md">
            </a>
         </div>
      </form>
   </div>
</div>
<script src="JS/login.js"></script>
<?php
require_once('page-layout/footer.php');
?>
