<?php
$sPageTitle = 'Added';
$sClassActive = 'drivers';
require_once(__DIR__ .'/includes/top.php');
require_once(__DIR__ .'/includes/Trucks_class.php');


$sTruckNumber = $_POST['truck_number'];
$sCapacity = $_POST['capacity'];
$sRegistration_date = $_POST['registration_date'];
$trucks = new Trucks();
$newTruck = $trucks->addTruck($sTruckNumber, $sCapacity, $sRegistration_date);
if($_POST){;
?>
<div class="container">
    <div class="row top-buffer">
        <h3>New Truck Added</h3>
        <div class="col-xs-8 col-xs-offset-2">
            <div> Truck Number: <?=$sTruckNumber?> </div>
            <div> Capacity: <?=$sCapacity?> </div>
            <div> Registration Date: <?=$sRegistration_date?> </div>            
        </div>
    </div>
</div>
</body>
</html>
<?php
}