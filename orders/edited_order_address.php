<?php


/* New object of Customer() */
require_once(__DIR__ . '/../includes/Orders_class.php');
$orders = new Orders();


// Get id from POST 

$pickup_company = $_POST['pickup_company'];
$pickup_street = $_POST['pickup_street'];
//$pickup_city = $values['pickup_city'];
//$pickup_postal_code = $values['pickup_postal_code'];
//$pickup_country = $values['pickup_country'];

$delivery_company = $_POST['delivery_company'];
$delivery_street = $_POST['delivery_street'];
//$delivery_city = $values['delivery_city'];
//$delivery_postal_code = $values['delivery_postal_code'];
//$delivery_country = $values['delivery_country'];
//$status = $values['status'];

$pickupAddressId = $_POST['pickup_address_id'];
//$pickupLocationId = $values['pickupLocationId'];
$deliveryAddressId = $_POST['delivery_address_id'];
//$deliveryLocationId = $values['deliveryLocationId'];

// Call update method in $orders object

$orders->updatePickupShipmentAddress($pickup_company, $pickup_street, $pickupAddressId);
$orders->updateDeliveryShipmentAddress($delivery_company, $delivery_street, $deliveryAddressId);
echo 'Success';
