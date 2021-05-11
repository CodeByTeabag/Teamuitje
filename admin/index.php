<?php
require_once('db.php');
if (isset($_GET['page'])) {
    $pages = ['activiteiten', 'contact', 'activiteiten_id', 'CRUD-create', 'CRUD-update', 'CRUD-delete', 'PERSOON-create', 'PERSOON-update', 'PERSOON-delete', 'USER-create', 'USER-update', 'USER-delete', 'logout', 'personeel', 'admin', 'inschrijvings_overzicht', 'inschrijving-delete'];
    if (in_array($_GET['page'], $pages)) {
        require_once($_GET['page'] . '.php');
    } else {
        require_once('404.php');
    }
} else {
    header('location: home.php');
}
