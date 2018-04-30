<?php
namespace model;
class Authentication {
private $expirationtime;
public function __construct(){
   $this->expirationtime=3600*1000;
}

public function authentication($account,$pwd){

$user=new User();
$uid=$user->verifyUser($account,$pwd);
if($uid!=null){
return (new Token())->createToken($uid,$this->$expirationtime);


}
else 
return "";
}





} 
