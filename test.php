<?php

require_once 'vendor/autoload.php';

/**use model\User;
$user=new User();
print_r($user->verifyUser("weihuagu","1992"));
**/
use model\Token;
use model\Authentication;
$auth=new Authentication();
$jwt=$auth->authentication("weihuagu","1992");
echo $jwt;
echo "\n";
$To=new Token();
print_r($To->getTokenClaims($jwt));
