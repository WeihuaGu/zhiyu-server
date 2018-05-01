<?php
namespace model;

class User extends Model{ 
public function __construct(){
   parent::__construct();
   $this->setTablename("Users"); 
}



public function addUser($account,$pwd,$gender="",$age=0){

$user=$this->database->select($this->tablename,"*",[ "account"=>$account]);
if(!$this->verifyAccountnameExist($account)){
$last_user_id = $this->database->insert($this->tablename, [
	"id"=> md5(uniqid()),
        "account" => $account,
        "pwd" => $pwd,
	"gender" => $gender,
	"age" => $age
    ]);
return  $this->verifyUser($account,$pwd);
}else
return null;

}

public function delUser($userid){
    $this->database->delete($this->tablename, [
        "AND" => [
            "id" => $userid
        ]
    ]);


}

public function updateUser($colname,$uid,$update){
    $this->database->update($this->tablename, [
        $colname => $update ], [
        "id" => $uid
    ]);


}


public function getUserInfo($userid){
$user=$this->database->select($this->tablename,"*",[ "id"=>$userid ]);
return $user;

}
public function verifyAccountnameExist($account){
$user=$this->database->select($this->tablename,"*",[ "account"=>$account]);
return !empty($user);


}
public function verifyUser($account,$pwd){
$user=$this->database->select($this->tablename,"*",[ "account"=>$account,"pwd"=>$pwd ]);
if(empty($user))
return null;
else
return $user[0]['id'];
}
}
