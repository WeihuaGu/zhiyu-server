<?php 
namespace model;

class Category{ 
private static $instance; 
private static $category;
public function __construct(){
   $this->importCategory();
  
}

public static function getInstance()  
    {  
        if (!(self::$instance instanceof self))  
        {  
            self::$instance = new self();  
        }  
        return self::$instance;  
    }  

public function importCategory(){

 if(empty(self::$category))
    self::$category = require_once dirname(dirname(__FILE__)).'/config/categoryconfig.php';
    return self::$category;

}

public function getCategory($categoryid){

return self::$category[$categoryid];

}

public function getAllCategory(){
return self::$category;

}

public function isCategoryById($categoryid){

return array_key_exists($categoryid,self::$category);
}







}
