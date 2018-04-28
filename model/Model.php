<?php

namespace model;
require_once dirname(dirname(__FILE__)).'/database.php';
class Model{ 

protected $database;

public function __construct(){
	$medoo=\MedooDatabase::getInstance();
	$this->database=$medoo->getMedoo();
    
}
public function databaseInfo(){
echo 'model info:';

$info=$this->database->info();
foreach($info as $item){
echo $item;
echo '</br>';
}

}



} 
