<?php

$sPageTitle = 'Dashboard';
$sClassActive = 'dashboard';
require_once(__DIR__ . '/includes/top.php');

/* New object of Customers() */
require_once(__DIR__ . '/includes/Dashboard_class.php');
require_once(__DIR__ . '/includes/Drivers_class.php');

$dayOrders = new Dashboard();

//$timezone = date_default_timezone_get();
$date = date('d/m/Y');
echo ($date);

$ordersResult = $dayOrders->listOpenOrders('2019-12-09');
$drivers = new Drivers();
/* Get a list of all drivers in DB */
$driversResult = $drivers->listAvailable();
?>

<div id="confirmationModal" class="dontDisplay">
    <div id="text">
        <h1>Please confirm the selection:</h1>
        <p>Order: <span id="orderSpan"></span></p>
        <p>Truck: <span id="driverSpan"></span></p>
        <form action="driver_assigned.php" method="post">
            <input type="hidden" id="orderSelectedInput" name="orderId" value="">
            <input type="hidden" id="driverSelectedInput" name="driverId" value="">
            <button type="submit" id="modalConfirm">Confirm</button>
            <button id="modalCancel">Cancel</button>
        </form>
    </div>
</div>

<input type="date" id="dateInput" name="orderDate">

<form id="dashboardOrdersForm">
    <?php
    foreach ($ordersResult as $val) {
        echo "<input type='radio' name='order' id='order$val[0]' value='$val[0]'><label for='order$val[0]'>$val[4] $val[5]</label>";
    } ?>
</form>
<form id="dashboardDriversForm">
    <?php
    foreach ($driversResult as $val) {
        echo "<input type='radio' name='driver' id='driver$val[0]' value='$val[0]'><label for='driver$val[0]'>$val[4]</label>";
    } ?>
</form>

<form id="confirmForm" method="POST">
    <h1>Order</h1>
    <p id="selectedOrderP"></p>

    <h1>Driver</h1>
    <p id="selectedDriverP"></p>

    <button type="submit" id="confirmAssignmentBtn">Assign</button>
</form>
<div id='map' style='width: 400px; height: 300px;'></div>

<script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="scripts/dashboard.js"></script>
<script src="scripts/map.js"></script>
</body>

</html>