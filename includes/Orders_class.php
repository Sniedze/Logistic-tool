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
                $onePickupAddress[] = [$row["company_name"], $row["street"], $row["city"], $row["postal_code"], $row["country"],$row["address_id"], $row["location_id"]];

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
                $oneDeliveryAddress[] = [$row["company_name"], $row["street"], $row["city"], $row["postal_code"], $row["country"], $row["address_id"], $row["location_id"]];

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
    function updateOrder($pickup_date, $delivery_date, $id, $goods, $size)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("UPDATE shipment_order SET pickup_date = ?, delivery_date = ?, product_name = ?, size = ? WHERE order_id = ?;");
            $stmt->execute([$pickup_date, $delivery_date, $goods, $size, $id]);

            $stmt = null;
            $db->disconnect($con);
        } else
            return false;
            
    }
    function updateOrderCustomer($id, $customer_name)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("UPDATE shipment_order SET customer_id = (SELECT customer_id FROM customer WHERE customer_name = ?) WHERE order_id = ?;");
            $stmt->execute([$customer_name, $id]);

            $stmt = null;
            $db->disconnect($con);
        } else
            return false;
            
    }
    function updatePickupShipmentAddress($pickup_company, $pickup_street, $pickup_address_id)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("UPDATE shipment_address SET company_name = ?, street = ? WHERE address_id = ?;");
            $stmt->execute([$pickup_company, $pickup_street, $pickup_address_id]);

            $stmt = null;
            $db->disconnect($con);
        } else
            return false;
            
    }
    function updateDeliveryShipmentAddress($delivery_company, $delivery_street, $delivery_address_id)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("UPDATE shipment_address SET company_name = ?, street = ? WHERE address_id = ?;");
            $stmt->execute([$delivery_company, $delivery_street, $delivery_address_id]);

            $stmt = null;
            $db->disconnect($con);
        } else
            return false;
            
    }

    function updatePickupLocation($pickup_city, $pickup_postal_code, $pickup_country, $pickupLocationId){
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("UPDATE order_location SET city = ?, postal_code = ?, country = ?  WHERE location_id = ?;");
            $stmt->execute([$pickup_city, $pickup_postal_code, $pickup_country, $pickupLocationId]);

            $stmt = null;
            $db->disconnect($con);
        } else
            return false;
    }

    function updateDeliveryLocation($delivery_city, $delivery_postal_code, $delivery_country, $deliveryLocationId){
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("UPDATE order_location SET city = ?, postal_code = ?, country = ?  WHERE location_id = ?;");
            $stmt->execute([$delivery_city, $delivery_postal_code, $delivery_country, $deliveryLocationId]);

            $stmt = null;
            $db->disconnect($con);
        } else
            return false;
    }
    
    function updateOrderStatus($status_name, $id){
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("UPDATE shipment_order SET order_status_id = (SELECT order_status_id FROM order_status WHERE status_name = ?) WHERE order_id = ?;");
            $stmt->execute([$status_name, $id]);

            $stmt = null;
            $db->disconnect($con);
        } else
            return false;
    }

    function getSearchResults($name){
        
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("SELECT * FROM shipment_order AS so           
            LEFT JOIN order_driver AS od USING (order_id)
            LEFT JOIN driver AS d USING (driver_id)
            LEFT JOIN truck AS t USING (truck_number)
            LEFT JOIN customer AS c USING (customer_id)
            LEFT JOIN shipment_address AS sa ON so.pickup_address_id = sa.address_id
            LEFT JOIN shipment_address AS sha ON so.delivery_address_id = sha.address_id
            LEFT JOIN order_location AS ol ON ol.location_id = sa.location_id
            LEFT JOIN order_status AS os USING (order_status_id)            
            WHERE c.customer_name LIKE ('%$name%')
            OR ol.city LIKE ('%$name%')
            OR ol.country LIKE ('%$name%')
            ORDER BY so.pickup_date;");
            $stmt->execute();
            while ($row = $stmt->fetch())
            $searchResults[] = [$row["order_id"], $row["customer_name"], $row["pickup_date"], $row["company_name"], $row["street"], $row["city"], $row["postal_code"],  $row["country"], $row["product_name"], $row["size"], $row["delivery_date"], $row["truck_number"], $row["status_name"]];
            
            $stmt = null;
            $db->disconnect($con);
            return $searchResults;
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
