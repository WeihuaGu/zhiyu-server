<?php
namespace model;

class User extends Model{ 
public function __construct(){
   parent::__construct();
   $this->setTablename("Users"); 
}



public function addUser($account,$pwd){



$last_user_id = $this->database->insert($this->tablename, [
        "account" => $account,
        "pwd" => $pwd
    ]);
print_r($last_user_id);

}

public function delUser(){


}

public function updateUser(){

}


public function getUserInfo($userid){
$user=$this->database->select($this->tablename,"*",[ "id"=>$userid ]);
return $user;

}

public function verifyUser($account,$pwd){
$user=$this->database->select($this->tablename,"*",[ "account"=>$account,"pwd"=>$pwd ]);
if(empty($user))
return null;
else
return $user[0]['id'];
}
}
