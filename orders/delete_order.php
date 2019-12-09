<?php

require_once(__DIR__ .'/../includes/Orders_class.php');

if($_POST){
    $id = $_POST['id'];
    
    $orders = new Orders();
    $orders->deleteOrder($id);
}
