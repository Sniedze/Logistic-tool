<?php

require_once(__DIR__."/connection.php");

class Orders
{
   
    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];

            $stmt = $con->prepare("SELECT * FROM order.*, customer.* FROM order" .
           " LEFT JOIN order ON order.customer_order = customer.customer_order" .
           " ORDER BY order.pickup_date");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["order_id"], $row["pickup_date"], $row["name"], $row["product"], $row["size"], $row["delivery_date"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }


}
