<?php


/* New object of Customer() */
require_once(__DIR__ . '/../includes/Orders_class.php');
$orders = new Orders();
print_r($_POST);
// Get id from POST 
//$id = $_POST['order_id'];
// $customer_name = $_POST['customer_name'];
// $pickup_date = $_POST['pickup_date'];
// $pickup_company = $_POST['pickup_company'];
// $pickup_street = $_POST['pickup_street'];
// $pickup_city = $_POST['pickup_city'];
// $pickup_postal_code = $_POST['pickup_postal_code'];
// $pickup_country = $_POST['pickup_country'];
// $delivery_date = $_POST['delivery_date'];
// $delivery_company = $_POST['delivery_company'];
// $delivery_street = $_POST['delivery_street'];
// $delivery_city = $_POST['delivery_city'];
// $delivery_postal_code = $_POST['delivery_postal_code'];
// $delivery_country = $_POST['delivery_country'];
// $truck_number = $_POST['truck_number'];
// $status = $_POST['status'];
// $goods = $_POST['goods'];
// $size = $_POST['size'];

// Call update method in $orders object
$customers->update($customer_name, $pickup_date, $pickup_company, $pickup_street, $pickup_city, $pickup_postal_code, $pickup_country, $delivery_company, $delivery_date, $delivery_street, $delivery_city, $delivery_postal_code, $delivery_country, $truck_number, $status, $id, $goods, $size);
echo $customers;
