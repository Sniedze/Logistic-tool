<?php
$sPageTitle = 'Added';
$sClassActive = 'customers';
require_once(__DIR__ .'/includes/top.php');
require_once(__DIR__ .'/includes/Customers_class.php');

$sCustomerName = $_POST['customer_name'];
$sRegNum = $_POST['reg_num'];
$sEmail = $_POST['email'];
$customers = new Customers();
$newCustomer = $customers->addCustomer($sRegNum, $sCustomerName, $sEmail);
if($_POST){;
?>
<div class="container">
    <div class="row top-buffer">
        <h3>New Customer created</h3>
        <div class="col-xs-8 col-xs-offset-2">
            <div> Name: <?=$sCustomerName?> </div>
            <div> Registration number: <?=$sRegNum?> </div>
            <div> Email: <?=$sEmail?> </div>            
        </div>
    </div>
</div>
</body>
</html>
<?php
}