<?php

require_once(__DIR__ .'/../includes/Customers_class.php');

if($_POST){
    $id = $_POST['id'];
    
    $customers = new Customers();
    $customers->deleteCustomer($id);
}
