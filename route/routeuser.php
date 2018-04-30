<?php

use model\Token;
use model\User;



function listuser(){

}

Flight::route('GET /users','listuser');

Flight::route('POST /user/me/', function(){
$body = Flight::request()->getBody();
$bodyjson=json_decode($body, false);
$token=$bodyjson->token;
$tokenvalid=new Token();
$uid=$tokenvalid->getUserid($token);
if($uid!=null)
Flight::json(array('code'=>200,'data'=> (new User())->getUserInfo($uid)[0]));
else
Flight::json(array('code'=>204 ,'desc'=>'user get faild'));
});


 
