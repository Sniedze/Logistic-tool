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
                $results[] = [$row["customer_id"], $row["customer_name"], $row["reg_number"], $row["email"]];

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
            $stmt = $con->prepare("UPDATE customer SET reg_number = ?, customer_name = ?, email = ? WHERE customer_id = ?;");

            $stmt->execute([$reg_number, $customer_name, $email, $id]);

            $stmt = null;
            $db->disconnect($con);
            
            
        } else
            return false;
    }

function addCustomer($sRegNum, $sCustomerName, $sEmail){
    $db = new DB();
        $con = $db->connect();
        if ($con) {
            try {
                $stmt = $con->prepare("INSERT INTO customer (reg_number, customer_name, email) VALUES (?,?,?)");
                $ok = $stmt->execute([$sRegNum, $sCustomerName, $sEmail]);

                $stmt = null;
                $db->disconnect($con);

                return ($ok);
            } catch (PDOException $e) {
                echo $e;
            }
        } else {
            $stmt = null;
            $db->disconnect($con);
            return false;
        }
}

    function deleteCustomer($id){
        $sTableName = 'customer';
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $stmt = $con->prepare("DELETE FROM ? WHERE customer_id = ?;");

            $stmt->execute([$sTableName, $id]);

            $stmt = null;
            $db->disconnect($con);
            
            
        } else
            return false;
    }


}
