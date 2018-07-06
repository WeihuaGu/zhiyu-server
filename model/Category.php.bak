<?php 

namespace model;
class Category extends Model{ 

private $category;
public function __construct(){
   parent::__construct();
   $this->setTablename("publish_category"); 
   $this->importCategory();
  
}


public function importCategory(){
 $this->category=require_once dirname(dirname(__FILE__)).'/config/categoryconfig.php';


 foreach ($this->category as $key=>$value){
	$category=$this->database->select($this->tablename,"*",[ "id"=> $key ]);
	if(empty($category))
$this->database->insert($this->tablename,['id'=>$key,'category'=>$value ]);
}


}

public function getCategory($categoryid){

return $this->category[$categoryid];

}

public function getAllCategory(){
return $this->category;

}

public function isCategoryById($categoryid){

return array_key_exists($categoryid,$this->category);
}







}
