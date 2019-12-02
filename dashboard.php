<?php

$sPageTitle = 'Dashboard';
$sClassActive = 'dashboard';
require_once(__DIR__ . '/includes/top.php');

/* New object of Customers() */
require_once(__DIR__ . '/includes/Dashboard_class.php');
require_once(__DIR__ . '/includes/Drivers_class.php');

$dayOrders = new Dashboard();
$ordersResult = $dayOrders->listOrders('2019-11-30');
$drivers = new Drivers();
/* Get a list of all drivers in DB */
$driversResult = $drivers->list();
?>

<form id="dashboardOrdersForm">
    <?php
    foreach ($ordersResult as $val) {
        echo "<input type='radio' name='orderId:$val[0]' id='orderId:$val[0]' value='$val[0]'><label for='orderId:$val[0]'>$val[4] $val[5]</label>";
    } ?>
</form>
<form id="dashboardTrucksForm">
    <?php
    foreach ($driversResult as $val) {
        echo "<input type='radio' name='driverId:$val[0]' id='driverId:$val[0]' value='$val[0]'><label for='driverId:$val[0]'>$val[1] $val[2] $val[4]</label>";
    } ?>
</form>





</body>

</html>