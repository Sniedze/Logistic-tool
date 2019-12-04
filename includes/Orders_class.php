<?php

require_once(__DIR__."/connection.php");

class Orders
{
   
    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            
            $stmt = $con->prepare("CALL GetOrders()");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["order_id"], $row["pickup_date"], $row["customer_name"], $row["product_name"], $row["size"], $row["delivery_date"], $row["truck_number"], $row["status_name"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
            
        } else
            return false;
    }

    function getPickupAdddress(){
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results=[];
            $stmt = $con->prepare("SELECT * FROM shipment_order AS so
                                    LEFT JOIN shipment_address AS sa ON sa.address_id = so.pickup_address_id
                                    LEFT JOIN order_location AS ol ON ol.location_id = sa.location_id
                                    ORDER BY so.pickup_date;");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["company_name"], $row["street"], $row["city"], $row["postal_code"], $row["country"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
            
        } else
            return false;
    }
    function getDeliveryAdddress(){
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results=[];
            $stmt = $con->prepare("SELECT * FROM shipment_order AS so
                                    LEFT JOIN shipment_address AS sa ON sa.address_id = so.delivery_address_id
                                    LEFT JOIN order_location AS ol ON ol.location_id = sa.location_id
                                    ORDER BY so.pickup_date");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["company_name"], $row["street"], $row["city"], $row["postal_code"], $row["country"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
            
        } else
            return false;
    }

    function addOrder($sPickupDate, $sCustomerName, $sGoods, $sSize, $sDelivery_date, $sPickupCompanyName, $sPickupStreet, $sPickupPostalCode, $sPickupCity, $sPickupCountry, $sDeliveryCompanyName, $sDeliveryStreet, $sDeliveryPostalCode, $sDeliveryCity, $sDeliveryCountry, $sStatusName){
        $db = new DB();
        $con = $db->connect();
    
        if ($con) {
            $stmt = $con->prepare("CALL AddOrder(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
            $stmt->execute([$sPickupDate, $sCustomerName, $sGoods, $sSize, $sDelivery_date, $sPickupPostalCode, $sPickupCity, $sPickupCountry, $sPickupCompanyName, $sPickupStreet, $sStatusName, $sDeliveryPostalCode,  $sDeliveryCity, $sDeliveryCountry, $sDeliveryCompanyName, $sDeliveryStreet]);
           
            $stmt = null;
            $db->disconnect($con);
            
            
        } else
            return false;
    }
    
   

}
