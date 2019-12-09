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
                $results[] = [$row['truck_number'], $row['capacity'], $row['registration_date']];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }

    function addTruck($sTruckNumber, $sCapacity, $sRegistration_date){
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("INSERT INTO truck (truck_number, capacity, registration_date) VALUES (?,?,?)");

            $stmt->execute([$sTruckNumber, $sCapacity, $sRegistration_date]);

            $stmt = null;
            $db->disconnect($con);
            
            
        } else
            return false;
    }
   
    }


