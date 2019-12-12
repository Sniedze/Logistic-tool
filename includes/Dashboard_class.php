<?php

require_once(__DIR__ . "/connection.php");

class Dashboard
{

    function listOpenOrders($date)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];

            $stmt = $con->prepare("SELECT * FROM shipment_order WHERE pickup_date='$date' AND order_status_id=1");
            $stmt->execute();

            while ($row = $stmt->fetch())

                $results[] = [$row["order_id"], $row["customer_id"], $row["pickup_date"], $row["delivery_date"], $row["product_name"], $row["size"], $row["order_status_id"]];

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
                WHERE order_id=$orderId"
            );
            $stmt->execute();

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
                "SELECT email FROM driver WHERE driver_id=$driverId"
            );
            $stmt->execute();

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
