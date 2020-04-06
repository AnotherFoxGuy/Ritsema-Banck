<?php

use RitsemaBanck\Cookie;

require __DIR__ . '/../../vendor/autoload.php';
$cookie = new Cookie("token");
$cookie->remove();
session_start();
session_unset();
session_destroy();
header("Location: /");
