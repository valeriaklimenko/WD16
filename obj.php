<?php

namespace object;
use object\authorization;
use object\register;

require_once "User.php";
require_once "Validate.php";
require_once "authorization.php";
echo '<pre>';

$authorization = new authorization();
$results = $authorization ->setLogin($_GET["login"])
    ->setPassword($_GET["password"])
    ->authorization();
print_r($results);
