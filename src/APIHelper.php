<?php


namespace RitsemaBanck;

class APIHelper
{
    public static function GetData(string $var)
    {
        if (!isset($_GET[$var])) {
            header('content-type: application/json; charset: utf-8');
            http_response_code(400);
            die('{ "error": "Invalid parameters"}');
        } else {
            return $_GET[$var];
        }
    }

    public static function ReturnData(array $var)
    {
        header('content-type: application/json; charset: utf-8');
        http_response_code(200);

        echo json_encode($var);
    }
}
