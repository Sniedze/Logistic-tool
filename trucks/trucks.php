
<?php

$sPageTitle = 'Trucks';
$sClassActive = 'trucks';
require_once(__DIR__.'/includes/top.php');

/* New object of Trucks() */
require_once(__DIR__.'/includes/Trucks_class.php');
$trucks = new Trucks();
/* Get a list of all trucks in DB */
$result = $trucks->list();
?>