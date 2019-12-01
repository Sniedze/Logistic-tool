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

            $stmt = $con->prepare("SELECT * FROM customer ORDER BY customer_name");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["customer_id"], $row["reg_number"], $row["customer_name"], $row["email"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }
    function getCustomerAndAddresses($id)
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = [];
            $stmt = $con->prepare("CALL GetSavedAddress(?)");
            $stmt->execute([$id]);

            while ($row = $stmt->fetch())
                $results[] = [$row["customer_id"], $row["reg_number"], $row["customer_name"], $row["email"], $row["company_name"], $row["street"], $row["postal_code"], $row["city"], $row["country"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }

    function update($reg_number, $customer_name, $email, $id)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare("UPDATE customer SET reg_number = ?, customer_name = ?, email = ? WHERE customer_id = $id;");

            $stmt->execute([$reg_number, $customer_name, $email]);

            $stmt = null;
            $db->disconnect($con);
            
            
        } else
            return false;
    }



}
