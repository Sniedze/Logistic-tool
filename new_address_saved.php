<?php
$sPageTitle = 'New Address';
$sClassActive = 'customers';
require_once(__DIR__ .'/includes/top.php');
require_once(__DIR__ .'/includes/Customers_class.php');

$sCompanyName = $_POST['company_name'];
$sStreet = $_POST['street'];
$sPostalCode = $_POST['postal_code'];
$sCity = $_POST['city'];
$sCountry = $_POST['country'];
$sId = $_POST['id'];
$customers = new Customers();
$newCustomer = $customers->saveNewAddress($sId, $sCompanyName, $sStreet, $sPostalCode, $sCity, $sCountry);
if($_POST){;
?>
<div class="container">
    <div class="row top-buffer">
        <h3>New Address Saved</h3>
        <div class="col-xs-8 col-xs-offset-2">
            <div> Name: <?=$sCompanyName?> </div>
            <div> Address: <?=$sStreet,$sPostalCode, $sCity, $sCountry ?> </div>                     
        </div>
    </div>
</div>
</body>
</html>
<?php
}