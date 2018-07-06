<?php

use model\Token;
use model\User;


Flight::route('GET /users','listuser');
function listuser(){

}


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

Flight::route('POST /user/adduser/',function(){
$body = Flight::request()->getBody();
$bodyjson=json_decode($body, false);
$user=new User();

$userid=$user->addUser($bodyjson->account,$bodyjson->pwd,$bodyjson->gender,$bodyjson->age);

if($userid)
Flight::json(array('code'=>200,'desc'=>'add user success','userid'=>$userid));
else
Flight::json(array('code'=>204,'desc'=>'add user faild'));

});

Flight::route('POST /user/update/',function(){
$body = Flight::request()->getBody();
$bodyjson=json_decode($body, false);
$token=$bodyjson->token;
$update=$bodyjson->update;
$tokenvalid=new Token();
$uid=$tokenvalid->getUserid($token);
if($uid!=null){
$user=new User();
foreach ($update as $key => $value){
if($key!="account"&&$key!="pwd")
$user->updateUser($key,$uid,$value);
}
Flight::json(array('code'=>200,'desc'=>'update succuess','data'=>$user->getUserInfo($uid)[0] ));
}
else
Flight::json(array('code'=>204,'desc'=>'auth faild'));
});

Flight::route('GET /user/verifyaccountnamenotexist/@account',function($account){
$user=new User();
if($user->verifyAccountnameExist($account))
Flight::json(array('code'=>204,'desc'=>'user account exist'));
else
Flight::json(array('code'=>200,'desc'=>'user account not exist'));

});




 
