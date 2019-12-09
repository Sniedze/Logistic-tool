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

            $stmt = $con->prepare("SELECT * FROM driver WHERE available=1");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["driver_id"], $row["first_name"], $row["last_name"], $row["email"], $row["truck_number"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }
}
