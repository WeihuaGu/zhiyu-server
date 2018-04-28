<?php
namespace model;

class User extends Model{ 

public function addUser($account,$pwd){



$last_user_id = $this->database->insert("Users", [
        "account" => $account,
        "pwd" => $pwd
    ]);
print_r($last_user_id);

}



}
