<?php
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['voucher']);
unset($_SESSION['voorletter']);
unset($_SESSION['tussenvoegsel']);
unset($_SESSION['achternaam']);

session_destroy();

header('Location: home.php');
?>
