<?php


namespace RitsemaBanck;

use mysqli;

class ConnectDB
{
    private $servername = "mysql";
    private $username = "admin";
    private $password = "admin";
    private $database = "ritsema_banck";
    private $conn;

    public function __construct()
    {
        $this->conn = new MySQLi($this->servername, $this->username, $this->password, $this->database);
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
