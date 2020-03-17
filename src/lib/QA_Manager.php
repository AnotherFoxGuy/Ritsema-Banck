<?php

namespace RitsemaBanck;

use RitsemaBanck\models\QA;

require __DIR__ . '/../../vendor/autoload.php';

class QA_Manager
{
    private $qa_list;

    public function SaveQA(QA $qa)
    {
        $conn = new ConnectDB();
        $mysql = $conn->getConnection();

        // Available servers
        $sql = "INSERT INTO QA(question, answer) VALUES ('$qa->Question','$qa->Answer')";
        if (!$mysql->query($sql)) {
            die("Failed: {$mysql->error}");
        }
    }


    public function GetListFromDB()
    {
        $conn = new ConnectDB();
        $mysql = $conn->getConnection();


        // Available servers
        $sql = "SELECT * FROM QA";

        $result = $mysql->query($sql);
        return $result->fetch_all();
    }

    public function DeleteByID(int $id)
    {
        $conn = new ConnectDB();
        $mysql = $conn->getConnection();

        $sql = "DELETE FROM QA WHERE id = '$id'";
        if (!$mysql->query($sql)) {
            die("Failed: {$mysql->error}");
        }
    }
}