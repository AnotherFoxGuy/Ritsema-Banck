<?php
require __DIR__ . '/../vendor/autoload.php';

use RitsemaBanck\APIHelper;
use RitsemaBanck\calc;

$x = APIHelper::GetData("x");
$y = APIHelper::GetData("y");

$answer = array(
    'result' => calc::add($x, $y),
);

APIHelper::ReturnData($answer);
