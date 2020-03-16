<?php

require __DIR__ . '/lib/ldap_config.php';


use LdapRecord\Models\OpenLDAP\OrganizationalUnit;


$org = new OrganizationalUnit();
$org->ou = "website";
$org->inside("ou=groups,ou=ritsema-banck,dc=ritsema-banck,dc=frl")->save();