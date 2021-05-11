<?php
require_once('db.php');

// Checkt of de pages wel bestaan met ?page=
if (isset($_GET['page'])) {
    $pages = ['home', 'activiteiten', 'login', 'inschrijven'];
    if (in_array($_GET['page'], $pages)) {
        include_once($_GET['page'] . '.php');
    } else {
        include_once('404.php');
    }
} 
else 
// Als ?page= leeg is of het voldoet niet aan de if statement wordt er een 404 error page getoond
{
    header('location: home.php');
}
