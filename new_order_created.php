<?php
$sPageTitle = 'Added Order';
$sClassActive = 'orders';
require_once(__DIR__ .'/includes/top.php');
require_once(__DIR__ .'/includes/Orders_class.php');

 $sPickupDate = $_POST['pickup_date'];
 $sCustomerName = $_POST['customer_name'];
 $sGoods = $_POST['goods'];
 $sSize = $_POST['size'];
 $sDelivery_date = $_POST['delivery_date'];
 $sPickupCompanyName = $_POST['pickup_company_name'];
 $sPickupStreet = $_POST['pickup_street'];
 $sPickupPostalCode = $_POST['pickup_postal_code'];
 $sPickupCity = $_POST['pickup_city'];
 $sPickupCountry = $_POST['pickup_country'];
 $sDeliveryCompanyName = $_POST['delivery_company_name'];
 $sDeliveryStreet = $_POST['delivery_street'];
 $sDeliveryPostalCode = $_POST['delivery_postal_code'];
 $sDeliveryCity = $_POST['delivery_city'];
 $sDeliveryCountry = $_POST['delivery_country'];

$newOrder = new Orders();
$newOrder->addOrder($sPickupDate, $sCustomerName, $sGoods, $sSize, $sDelivery_date, $sPickupCompanyName, $sPickupStreet, $sPickupPostalCode, $sPickupCity, $sPickupCountry, $sDeliveryCompanyName, $sDeliveryStreet, $sDeliveryPostalCode, $sDeliveryCity, $sDeliveryCountry, 'Ordered');
if($_POST){;
?>
<div class="container">
    <div class="row top-buffer">
        <h3>New Order created</h3>
        <div class="col-xs-8 col-xs-offset-2">
            <div> Customer: <?=$sCustomerName?> </div>
            <div> Goods: <?=$sGoods?> </div>
            <div> Size: <?=$sSize?> </div>
            <div> Pickup: <?=$sPickupPostalCode?> </div>  
            <div> Delivery: <?=$sDeliveryPostalCode?> </div>          
        </div>
    </div>
</div>
</body>
</html>
<?php
}