<?php

require_once(__DIR__ . "/connection.php");

class Dashboard
{

    function listOrders($date)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];

            $stmt = $con->prepare("SELECT * FROM shipment_order WHERE pickup_date='$date'");
            $stmt->execute();

            while ($row = $stmt->fetch())

                $results[] = [$row["order_id"], $row["customer_id"], $row["pickup_date"], $row["delivery_date"], $row["product_name"], $row["size"], $row["order_status_id"]];

            $stmt = null;
            $db->disconnect($con);
            return $results;
        } else

            return false;
    }
}
