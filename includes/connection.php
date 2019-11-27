<?php

    class DB {

        /**
         * Opens a connection to the database
         * 
         * @returns a connection object
         */
        public function connect() {
            $server = 'localhost';
            $db = 'logistic_tool';
            $user = 'root';
            $pwd = '';

            $DSN = 'mysql:host=' . $server . ';dbname=' . $db . ';charset=utf8';
            
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                $connections_to_db = new PDO($DSN, $user, $pwd, $options); 
            } catch (PDOException $e) {
                echo 'Connection unsuccessful';
                die('Connection unsuccessful: ' . $connections_to_db->connect_error());
                exit();
            }
            
            return($connections_to_db);   
        }

        /**
         * Closes a connection to the database
         * 
         * @param the connection object to disconnect
         */
        public function disconnect($conobj) {
            $conobj = null;
        }
    }
