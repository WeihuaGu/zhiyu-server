<?php

require_once 'vendor/autoload.php';

use model\User;
$user=new User();
print_r($user->getUserInfo(0));

