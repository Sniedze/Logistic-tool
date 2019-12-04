<?php

require_once(__DIR__ . "/connection.php");

class Orders
{

    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];
            $stmt = $con->prepare("CALL GetOrders()");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["order_id"], $row["pickup_date"], $row["customer_name"], $row["postal_code"], $row["product_name"], $row["size"], $row["delivery_date"], $row["postal_code"], $row["truck_number"], $row["status_name"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }

    function addOrder($sPickupDate, $sCustomerName, $sGoods, $sSize, $sDelivery_date, $sCompanyName, $sStreet, $sPostalCode, $sCity, $sCountry, $sStatusName)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("CALL AddOrder(?,?,?,?,?,?,?,?,?,?,?);");
            $stmt->execute([$sPickupDate, $sCustomerName, $sGoods, $sSize, $sDelivery_date, $sPostalCode, $sCity, $sCountry, $sCompanyName, $sStreet, $sStatusName]);

            $stmt = null;
            $db->disconnect($con);
        } else
            return false;
    }
}
