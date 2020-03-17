<?php

require __DIR__ . '/../vendor/autoload.php';

use RitsemaBanck\QA_Manager;

$qa = new QA_Manager();

$list = $qa->GetListFromDB();
var_dump($list);

foreach ($list as $item){
    if($item[2] === 'Van melk')
        echo "Found!";
}
