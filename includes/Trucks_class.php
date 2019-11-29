<?php

require_once(__DIR__.'/connection.php');

class Trucks
{
   
    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];

            $stmt = $con->prepare("SELECT * FROM truck ORDER BY truck_number");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row['truck_number'], $row['capacity'], $row['length'], $row['registration_date']];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }


}
