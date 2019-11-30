<?php

require_once(__DIR__."/connection.php");

class Orders
{
   
    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            
            $stmt = $con->prepare("SELECT * FROM shipment_order AS so
           LEFT JOIN customer AS c ON so.customer_id = c.customer_id
           LEFT JOIN order_driver AS od ON od.order_id = so.order_id
           LEFT JOIN driver AS d ON d.driver_id = od.driver_id
           LEFT JOIN truck AS t ON t.truck_number = d.truck_number
           LEFT JOIN order_address AS oa ON oa.order_id = so.order_id
           LEFT JOIN shipment_address AS sa ON oa.pickup_address_id = sa.address_id
           LEFT JOIN shipment_address AS sha ON oa.delivery_address_id = sha.address_id
           LEFT JOIN order_location AS ol ON ol.location_id = sha.location_id
           LEFT JOIN order_status AS os ON os.order_status_id = so.order_status_id            

           ORDER BY so.pickup_date;");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["order_id"], $row["pickup_date"], $row["name"], $row["postal_code"], $row["product_name"], $row["size"], $row["delivery_date"], $row["postal_code"], $row["truck_number"], $row["status_name"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;




            
        } else
            return false;
    }


}
