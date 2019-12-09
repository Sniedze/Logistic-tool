<?php

require_once(__DIR__ . "/connection.php");

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
                $orderData[] = [$row["order_id"], $row["pickup_date"], $row["customer_name"], $row["product_name"], $row["size"], $row["delivery_date"], $row["truck_number"], $row["status_name"]];

            $stmt = null;
            $db->disconnect($con);

            return $orderData;
        } else
            return false;
    }

    function getPickupAdddress()
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $pickupAddress = [];
            $stmt = $con->prepare("SELECT * FROM shipment_order AS so
                                    LEFT JOIN shipment_address AS sa ON sa.address_id = so.pickup_address_id
                                    LEFT JOIN order_location AS ol ON ol.location_id = sa.location_id
                                    ORDER BY so.pickup_date;");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $pickupAddress[] = [$row["company_name"], $row["street"], $row["city"], $row["postal_code"], $row["country"]];

            $stmt = null;
            $db->disconnect($con);

            return $pickupAddress;
        } else
            return false;
    }
    function getDeliveryAdddress()
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $deliveryAddress = [];
            $stmt = $con->prepare("SELECT * FROM shipment_order AS so
                                    LEFT JOIN shipment_address AS sa ON sa.address_id = so.delivery_address_id
                                    LEFT JOIN order_location AS ol ON ol.location_id = sa.location_id
                                    ORDER BY so.pickup_date");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $deliveryAddress[] = [$row["company_name"], $row["street"], $row["city"], $row["postal_code"], $row["country"]];

            $stmt = null;
            $db->disconnect($con);

            return $deliveryAddress;
        } else
            return false;
    }
    function getOneOrder($id)
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {

            $stmt = $con->prepare("CALL GetOneOrder(?)");
            $stmt->execute([$id]);

            while ($row = $stmt->fetch())
                $oneOrderData[] = [$row["order_id"], $row["pickup_date"], $row["customer_name"], $row["product_name"], $row["size"], $row["delivery_date"], $row["truck_number"], $row["status_name"]];

            $stmt = null;
            $db->disconnect($con);

            return $oneOrderData;
        } else
            return false;
    }

    function getOnePickupAdddress($id)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $onePickupAddress = [];
            $stmt = $con->prepare("SELECT * FROM shipment_order AS so
                                    LEFT JOIN shipment_address AS sa ON sa.address_id = so.pickup_address_id
                                    LEFT JOIN order_location AS ol ON ol.location_id = sa.location_id
                                    WHERE so.order_id = ?;");
            $stmt->execute([$id]);

            while ($row = $stmt->fetch())
                $onePickupAddress[] = [$row["company_name"], $row["street"], $row["city"], $row["postal_code"], $row["country"]];

            $stmt = null;
            $db->disconnect($con);

            return $onePickupAddress;
        } else
            return false;
    }
    function getOneDeliveryAdddress($id)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $oneDeliveryAddress = [];
            $stmt = $con->prepare("SELECT * FROM shipment_order AS so
                                    LEFT JOIN shipment_address AS sa ON sa.address_id = so.delivery_address_id
                                    LEFT JOIN order_location AS ol ON ol.location_id = sa.location_id
                                    WHERE so.order_id = ?");
            $stmt->execute([$id]);

            while ($row = $stmt->fetch())
                $oneDeliveryAddress[] = [$row["company_name"], $row["street"], $row["city"], $row["postal_code"], $row["country"]];

            $stmt = null;
            $db->disconnect($con);

            return $oneDeliveryAddress;
        } else
            return false;
    }

    function addOrder($sPickupDate, $sCustomerName, $sGoods, $sSize, $sDelivery_date, $sPickupCompanyName, $sPickupStreet, $sPickupPostalCode, $sPickupCity, $sPickupCountry, $sDeliveryCompanyName, $sDeliveryStreet, $sDeliveryPostalCode, $sDeliveryCity, $sDeliveryCountry, $sStatusName)
    {
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
    function getStatusNames()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {

            $stmt = $con->prepare("SELECT os.status_name FROM order_status AS os");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $statusNames[] = [$row["status_name"]];

            $stmt = null;
            $db->disconnect($con);

            return $statusNames;
        } else
            return false;
    }
    function deleteOrder($id){
        $db = new DB();
    $con = $db->connect();

    if ($con) {
        $stmt = $con->prepare("DELETE FROM order WHERE customer_id = ?;");
        $stmt->execute([$id]);

        $stmt = null;
        $db->disconnect($con);
        
        
    } else
        return false;
    }
}
// BEGIN
// 	SELECT * FROM shipment_order AS so           
//            LEFT JOIN order_driver AS od ON od.order_id = so.order_id
//            LEFT JOIN driver AS d ON d.driver_id = od.driver_id
//            LEFT JOIN truck AS t ON t.truck_number = d.truck_number
//            LEFT JOIN customer AS c ON c.customer_id = so.customer_id
//            LEFT JOIN shipment_address AS sa ON so.pickup_address_id = sa.address_id
//            LEFT JOIN shipment_address AS sha ON so.delivery_address_id = sha.address_id
//            LEFT JOIN order_location AS ol ON ol.location_id = sa.location_id
//            LEFT JOIN order_status AS os ON so.order_status_id = os.order_status_id            

//            ORDER BY so.pickup_date;
// END
