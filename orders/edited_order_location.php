<?php


/* New object of Customer() */
require_once(__DIR__ . '/../includes/Orders_class.php');
$orders = new Orders();


// Get id from POST 

$status_name = $_POST['status_name'];
$pickup_city = $_POST['pickup_city'];
$pickup_postal_code = $_POST['pickup_postal_code'];
$pickup_country = $_POST['pickup_country'];
$delivery_city = $_POST['delivery_city'];
$delivery_postal_code = $_POST['delivery_postal_code'];
$delivery_country = $_POST['delivery_country'];
$pickupLocationId = $_POST['pickup_location_id'];
$deliveryLocationId = $_POST['delivery_location_id'];


// Call update method in $orders object

$orders->updatePickupLocation($pickup_city, $pickup_postal_code, $pickup_country, $pickupLocationId);
$orders->updateDeliveryLocation($delivery_city, $delivery_postal_code, $delivery_country, $status, $deliveryLocationId);
$orders->updateOrderStatus($status_name, $id);
echo 'Success';
