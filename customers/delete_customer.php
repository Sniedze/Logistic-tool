<?php

require_once(__DIR__ .'/../includes/Customers_class.php');
if($_GET){
    $customers = new Customers();
    return $customers->deleteCustomer($_GET['id']);
}
