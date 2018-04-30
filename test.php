<?php

require_once 'vendor/autoload.php';

/**use model\User;
$user=new User();
print_r($user->verifyUser("weihuagu","1992"));
**/
use model\Authentication;

$auth=new Authentication();
echo $auth->authentication("weihuagu","1993");
