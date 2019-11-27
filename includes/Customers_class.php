<?php

require_once(__DIR__."/connection.php");

class Customers
{
   
    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];

            $stmt = $con->prepare("SELECT * FROM customer ORDER BY name");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["customer_id"], $row["reg_number"], $row["name"], $row["email"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }


}
