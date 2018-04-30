<?php 

namespace model;
class Category extends Model{ 

private $category;
public function __construct(){
   parent::__construct();
   $this->importCategory();
   $this->setTablename("publish_category"); 
}


public function importCategory(){
 $this->category=require_once dirname(dirname(__FILE__)).'/categoryconfig.php';


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
