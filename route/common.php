<?php

use model\Token;
function getBodyJson(){
$body = Flight::request()->getBody();
$bodyjson=json_decode($body, false);
return $bodyjson;
}
function verifyToken(){
$bodyjson=getBodyJson();
$token=$bodyjson->token;
$tokenvalid=new Token();
$uid=$tokenvalid->getUserid($token);
return $uid;
}
 
