
<?php

$sPageTitle = 'Orders';
$sClassActive = 'orders';
require_once(__DIR__.'/includes/top.php');

/* New object of Orders() */
require_once(__DIR__.'/includes/Orders_class.php');
$orders = new Orders();
/* Get a list of all orders in DB */
$result = $orders->list();
?>