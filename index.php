<?php

$sPageTitle = 'Dashboard';
$sClassActive = 'home';
require_once(__DIR__ . '/includes/top.php');

/* New object of Customers() */
require_once(__DIR__ . '/includes/Dashboard_class.php');
require_once(__DIR__ . '/includes/Drivers_class.php');
$dayOrders = new Dashboard();
$drivers = new Drivers();



if (!isset($_GET["date"]) || !$_GET["date"]) {
    $date = date('Y-d-m');
    //$date = '2019-12-09';
} else {
    $date = $_GET["date"];
}

//echo ($date);
//$date = '2019-12-09';
//$ordersResult = $dayOrders->listOpenOrders($date);

/* Get a list of all drivers in DB */

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

<div id="indexContent">
    <div id="left">
        <input type="date" id="dateInput" name="orderDate" value=<?= $date ?>>
        <form id="dashboardOrdersForm">
            <h1>Pick a Cargo</h1>
            <div id="latvia">
                <h2>Latvia</h2>
                <?php $result = $dayOrders->listOpenOrders($date, "Latvia");
                foreach ($result as $val) {
                    echo "<input type='radio' name='order' id='order$val[0]' value='$val[0]'><label for='order$val[0]'>$val[2] $val[3]</label>";
                }
                ?>
            </div>
            <div id="denmark">
                <h2>Denmark</h2>
                <?php $result = $dayOrders->listOpenOrders($date, "Denmark");
                foreach ($result as $val) {
                    echo "<input type='radio' name='order' id='order$val[0]' value='$val[0]'><label for='order$val[0]'>$val[2] $val[3]</label>";
                }
                ?>
            </div>
            <div id="norway">
                <h2>Norway</h2>
                <?php $result = $dayOrders->listOpenOrders($date, "Norway");
                foreach ($result as $val) {
                    echo "<input type='radio' name='order' id='order$val[0]' value='$val[0]'><label for='order$val[0]'>$val[2] $val[3]</label>";
                }
                ?>
            </div>
            <div id="sweden">
                <h2>Sweden</h2>
                <?php $result = $dayOrders->listOpenOrders($date, "Sweden");
                foreach ($result as $val) {
                    echo "<input type='radio' name='order' id='order$val[0]' value='$val[0]'><label for='order$val[0]'>$val[2] $val[3]</label>";
                }
                ?>
            </div>

        </form>
        <form id="dashboardDriversForm">
            <h1>Pick a Truck</h1>
            <?php
            $driversResult = $drivers->listAvailable($date);
            foreach ($driversResult as $val) {
                echo "<input type='radio' name='driver' id='driver$val[0]' value='$val[0]'><label for='driver$val[0]'>$val[2]</label>";
            } ?>
        </form>

        <form id="confirm" method="POST">
            <h1>Order</h1>
            <p id="selectedOrderP"></p>

            <h1>Driver</h1>
            <p id="selectedDriverP"></p>

            <button type="submit" id="confirmAssignmentBtn">Assign</button>
        </form>
    </div>
    <div id='map'></div>
</div>




<script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="scripts/dashboard.js"></script>
<script src="scripts/map.js"></script>
</body>

</html>