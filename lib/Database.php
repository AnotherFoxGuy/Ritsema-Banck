<?php

namespace RitsemaBanck;
class Database
{
    private $server;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct()
    {

    }

    public function connect($server, $username, $password, $database): bool
    {
        $conn = new ConnectDB();
        $this->connection = $conn->getConnection();
        if ($this->connection->connect_error) {
            return false;
        } else {
            return true;
        }
    }

    public function get_connection(): object
    {
        return $this->connection;
    }

    public function select($query, $values)
    {
        $this->connect("localhost", "root", "", "ritsemabanck");
        $stmt = $this->get_connection()->prepare($query);

        // stores all the types of the values in a variable
        $type = "";
        for ($i = 0; $i < count($values); $i++) {
            $type = $type . substr(gettype($values[$i]), 0, 1);
        }

        // appends all the values to the arguments
        $args = array(&$type);
        for ($i = 0; $i < count($values); $i++) {
            $args[] = &$values[$i];
        }

        // binds the values to the prepared query
        call_user_func_array(array($stmt, 'bind_param'), $args);

        // excutes the query and returns the results
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;

        $this->disconnect();
    }

    public function update($query, $values): bool
    {
        // creates a new instance of the Cookie class
        $cookie = new Cookie("token");
        if ($cookie->validate_user($cookie->get_value())) { // validates that the token stored in the cookie is verified
            $this->connect("localhost", "root", "", "ritsemabanck");
            // prepares the query
            $stmt = $this->get_connection()->prepare($query);

            // stores the types of the values to a string
            $type = "";
            for ($i = 0; $i < count($values); $i++) {
                $type = $type . substr(gettype($values[$i]), 0, 1);
            }

            // appends the values to the array
            $args = array(&$type);
            for ($i = 0; $i < count($values); $i++) {
                $args[] = &$values[$i];
            }

            // binds the parameters to the prepared query
            call_user_func_array(array($stmt, 'bind_param'), $args);
            // executes the query and returns either true of false
            $result = $stmt->execute();
            $database->disconnect();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function fetch($result)
    {
        return $result->fetch_assoc();
    }

    // returns either true or false based on the returned rows from the input
    public function empty($result): bool
    {
        if ($result->num_rows == 1) {
            return false;
        } else {
            return true;
        }
    }

    public function disconnect()
    {
        $this->connection->close();
    }
}
