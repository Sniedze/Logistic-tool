<?php

require_once(__DIR__."/connection.php");

class Dashboard
{
   
    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
           
        } else
            return false;
    }

}
