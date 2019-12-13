<?php

require_once(__DIR__ . "/connection.php");

class Drivers
{

    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];

            $stmt = $con->prepare("CALL GetDrivers();");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["driver_id"], $row["first_name"], $row["last_name"], $row["email"], $row["CPR"], $row["salary"], $row["truck_number"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }
    function listAvailable($date)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];

            $stmt = $con->prepare("SELECT d.driver_id, email, truck_number FROM shipment_order AS so
            INNER JOIN order_driver AS od ON so.order_id=od.order_id
            INNER JOIN driver AS d ON od.driver_id=d.driver_id
            WHERE delivery_date=?");
            $stmt->execute([$date]);

            while ($row = $stmt->fetch())
                $results[] = [$row["driver_id"], $row["email"], $row["truck_number"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }
    function addDriver($sFirstName, $sLastName, $sEmail, $sTruckNumber, $sCpr, $sSalary)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("CALL AddDriver(?,?,?,?,?,?)");

            $stmt->execute([$sFirstName, $sLastName, $sEmail, $sTruckNumber, $sCpr, $sSalary]);

            $stmt = null;
            $db->disconnect($con);
        } else
            return false;
    }
}
