<?php
//require_once(__DIR__ . '/../includes/top.php');

/* New object of Customer() */
require_once(__DIR__ . '/../includes/Customers_class.php');
$customers = new Customers();

// Get id from POST 
$id = $_POST['customer_id'];
$name = $_POST['name'];
$reg_num = $_POST['reg_num'];
$email = $_POST['email'];

// Call update method in $customers object
$customers->update($reg_num, $name, $email, $id);
