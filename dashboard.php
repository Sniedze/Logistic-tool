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
        echo "<input type='radio' name='order$val[0]' id='order$val[0]' value='$val[0]'><label for='order$val[0]'>$val[4] $val[5]</label>";
    } ?>
</form>
<form id="dashboardDriversForm">
    <?php
    foreach ($driversResult as $val) {
        echo "<input type='radio' name='driver$val[0]' id='driver$val[0]' value='$val[0]'><label for='driver$val[0]'>$val[1] $val[2] $val[4]</label>";
    } ?>
</form>

<form id="confirmForm" method="POST">
    <h1>Order</h1>
    <p id="selectedOrderP"></p>
    <input type="hidden" id="orderSelectedInput" name="orderSelected" value="">
    <h1>Driver</h1>
    <p id="selectedDriverP"></p>
    <input type="hidden" id="driverSelectedInput" name="driverSelected" value="">
    <button type="submit" id="confirmAssignmentBtn">Confirm</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="scripts/dashboard_add_confirm.js"></script>
</body>

</html>