<?php

require_once(__DIR__."/connection.php");

class Orders
{
   
    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            
            $stmt = $con->prepare("CALL `GetOrders`()");
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
