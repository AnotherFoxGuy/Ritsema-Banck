<?php

require __DIR__ . '/../vendor/autoload.php';

use RitsemaBanck\QA_Manager;

$qa = new QA_Manager();

$list = $qa->GetListFromDB();
var_dump($list);
