<?php

require __DIR__ . '/../../vendor/autoload.php';

use LdapRecord\Connection;
use LdapRecord\Container;

$connection = new Connection([
    'hosts'    => ['openldap'],
    'port'     => 389,
    'use_ssl'  => true,
    //'use_tls'  => true,
    'username' => 'cn=admin, dc=ritsema-banck, dc=frl',
    'password' => 'admin',
]);

$connection->connect();

Container::addConnection($connection);
