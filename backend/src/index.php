<?php

$answer = array(
    'result' => true,
    'message' => 'Server sucessfully registered',
    'challenge' => 'dsdsds',
    'verified-level' => 'sddsdsafs'
);

header('content-type: application/json; charset: utf-8');
http_response_code(200);

echo json_encode($answer);