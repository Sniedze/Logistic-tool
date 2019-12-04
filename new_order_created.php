<?php
$sPageTitle = 'Added Order';
$sClassActive = 'orders';
require_once(__DIR__ .'/includes/top.php');
require_once(__DIR__ .'/includes/Orders_class.php');

echo $sPickupDate = $_POST['pickup_date'];
echo $sCustomerName = $_POST['customer_name'];
echo $sGoods = $_POST['goods'];
echo $sSize = $_POST['size'];
echo $sDelivery_date = $_POST['delivery_date'];
echo $sPickupCompanyName = $_POST['pickup_company_name'];
echo $sPickupStreet = $_POST['pickup_street'];
echo $sPickupPostalCode = $_POST['pickup_postal_code'];
echo $sPickupCity = $_POST['pickup_city'];
echo $sPickupCountry = $_POST['pickup_country'];
echo $sDeliveryCompanyName = $_POST['delivery_company_name'];
echo $sDeliveryStreet = $_POST['delivery_street'];
echo $sDeliveryPostalCode = $_POST['delivery_postal_code'];
echo $sDeliveryCity = $_POST['delivery_city'];
echo $sDeliveryCountry = $_POST['delivery_country'];

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