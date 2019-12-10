<?php


/* New object of Customer() */
require_once(__DIR__ . '/../includes/Orders_class.php');
$orders = new Orders();


// Get id from POST 
$id = $_POST['order_id'];
$customer_name = $_POST['customer_name'];
$pickup_date = $_POST['pickup_date'];
$status_name = $_POST['status_name'];
$delivery_date = $_POST['delivery_date'];
//$delivery_company = $values['delivery_company'];
//$delivery_street = $values['delivery_street'];
//$delivery_city = $values['delivery_city'];
//$delivery_postal_code = $values['delivery_postal_code'];
//$delivery_country = $values['delivery_country'];
//$status = $values['status'];
$goods = $_POST['goods'];
$size = $_POST['size'];

//$pickupLocationId = $values['pickupLocationId'];
//$deliveryAddressId = $values['deliveryAddressId'];
//$deliveryLocationId = $values['deliveryLocationId'];

// Call update method in $orders object
$orders->updateOrder($pickup_date, $delivery_date, $id, $goods, $size);
$orders->updateOrderCustomer($id, $customer_name);
$orders->updateOrderStatus($status_name, $id);

echo 'Success';
