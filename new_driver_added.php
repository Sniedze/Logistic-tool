<?php
$sPageTitle = 'Added';
$sClassActive = 'drivers';
require_once(__DIR__ .'/includes/top.php');
require_once(__DIR__ .'/includes/Drivers_class.php');

$sFirstName = $_POST['first_name'];
$sLastName = $_POST['last_name'];
$sEmail = $_POST['email'];
$sTruckNumber = $_POST['truck_number'];
$sCpr = $_POST['cpr'];
$sSalary = $_POST['salary'];
$drivers = new Drivers();
$newDriver = $drivers->addDriver($sFirstName, $sLastName, $sEmail, $sTruckNumber, $sCpr, $sSalary);
if($_POST){;
?>
<div class="container">
    <div class="row top-buffer">
        <h3>New Customer created</h3>
        <div class="col-xs-8 col-xs-offset-2">
            <div> Name: <?=$sFirstName ?> <?=$sLastName ?> </div>
            <div> CPR: <?=$sCpr?> </div>
            <div> Email: <?=$sEmail?> </div> 
            <div> Salary: <?=$sSalary?> </div> 
            <div> Truck Assigned: <?=$sTruckNumber?> </div>
            

        </div>
    </div>
</div>
</body>
</html>
<?php
}