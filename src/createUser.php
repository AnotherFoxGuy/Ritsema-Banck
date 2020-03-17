<?php
require __DIR__ . '/lib/ldap_config.php';

use LdapRecord\Models\OpenLDAP\User;
use LdapRecord\Models\OpenLDAP\Group;

$user = new User();

$user->cn = 'test';
$user->sn = 'John Doe';
$user->uid = 'test'; //de gebruikersnaam
$user->userPassword = 'test';

// Save the user inside our 'Users' OU:
$user->inside('ou=users,dc=ritsema-banck,dc=frl')->save();


//$group = Group::findOrFail('cn=web,dc=ritsema-banck,dc=frl');