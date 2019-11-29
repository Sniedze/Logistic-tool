<?php

require_once(__DIR__."/connection.php");

class Drivers
{
   
    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];

            $stmt = $con->prepare("SELECT * FROM driver ORDER BY last_name");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["driver_id"], $row["first_name"], $row["last_name"], $row["email"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }


}
