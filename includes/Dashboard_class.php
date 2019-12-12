<?php

require_once(__DIR__ . "/connection.php");

class Dashboard
{

    function listOpenOrders($date, $country)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];

            $stmt = $con->prepare("SELECT order_id, pickup_date, product_name, size FROM shipment_order AS so
                                  LEFT JOIN shipment_address AS sa ON so.pickup_address_id = sa.address_id
                                  LEFT JOIN order_location as oa ON sa.location_id = oa.location_id
                                  WHERE pickup_date=? AND country=? AND order_status_id=1");
            $stmt->execute([$date, $country]);

            while ($row = $stmt->fetch())

                $results[] = [$row["order_id"], $row["pickup_date"], $row["product_name"], $row["size"]];

            $stmt = null;
            $db->disconnect($con);
            return $results;
        } else

            return false;
    }
    function getCustomerEmail($orderId)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $result = "";

            $stmt = $con->prepare(
                "SELECT email FROM shipment_order AS so
                LEFT JOIN customer AS c ON so.customer_id = c.customer_id
                WHERE order_id=?"
            );
            $stmt->execute([$orderId]);

            while ($row = $stmt->fetch())

                $result = $row["email"];

            $stmt = null;
            $db->disconnect($con);
            return $result;
        } else

            return false;
    }
    function getDriverEmail($driverId)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $result = "";

            $stmt = $con->prepare(
                "SELECT email FROM driver WHERE driver_id=?"
            );
            $stmt->execute([$driverId]);

            while ($row = $stmt->fetch())

                $result = $row["email"];

            $stmt = null;
            $db->disconnect($con);
            return $result;
        } else

            return false;
    }
    function assignDriver($orderId, $driverId)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $stmt = $con->prepare("CALL AssignDriver(?,?)");
            $stmt->execute([$orderId, $driverId]);
            $stmt = null;
            $db->disconnect($con);
        } else

            return false;
    }
}
