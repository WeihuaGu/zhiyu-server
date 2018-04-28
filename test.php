<?php

require_once 'vendor/autoload.php';

use model\User;

$user=new User();
$user->databaseInfo();
