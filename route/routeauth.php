<?php 

use model\Authentication;
use model\Token;



function auth(){
$body = Flight::request()->getBody();
$useraccount=json_decode($body, false);
$auth=new Authentication();
$jwt=$auth->authentication($useraccount->account,$useraccount->pwd);
if ($jwt=="")
Flight::json(array('code' => 204,'desc'=>'authentication faild'));
else
Flight::json(array('code'=> 200 , 'token'=> $jwt));

}

Flight::route('POST /authentication','auth');


Flight::route('POST /authentication/validtoken', function(){
$body = Flight::request()->getBody();
$bodyjson=json_decode($body, false);
if((new Token)->validatingToken($bodyjson->token))
Flight::json(array('code'=>200,'desc'=>'token is right'));
else
Flight::json(array('code'=>204,'desc'=>'token is down'));
});


