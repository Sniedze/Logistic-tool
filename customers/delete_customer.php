<?php

require_once(__DIR__ .'/../includes/Customers_class.php');
if($_GET){
    $customers = new Customers();
    $customers->deleteCustomer($_GET['id']);
}
