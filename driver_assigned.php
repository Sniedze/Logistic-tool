<?php
$sPageTitle = 'Driver Assignment';
$sClassActive = 'dashboard';
require_once(__DIR__ . '/includes/top.php');
require_once(__DIR__ . '/includes/Dashboard_class.php');
require_once(__DIR__ . '/includes/send_email.php');


if (!$_POST["orderId"] || !$_POST["driverId"]) {
    header('Location: index.php');
}

$dashboard = new Dashboard();
$newAssignment = $dashboard->assignDriver($_POST["orderId"], $_POST["driverId"]);
$customerEmail = $dashboard->getCustomerEmail($_POST["orderId"]);

$driverEmail = $dashboard->getDriverEmail($_POST["driverId"]);

sendEmail($customerEmail, "customer");
sendEmail($driverEmail, "driver");
?>

<h1>Driver has been assigned.</h1>
</body>

</html>
<?php
sleep(1);
header('Location: index.php');
