<?php


namespace RitsemaBanck;
use mysqli;

class ConnectDB
{
    private $servername = "localhost";
    private $username = "travis";
    private $password = "";
    private $database = "ritsema_banck";
    private $conn;

    public function __construct() {
        $this->conn = new MySQLi($this->servername, $this->username, $this->password, $this->database);
    }

    public function getConnection() {
        return $this->conn;
    }
}