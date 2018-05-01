<?php
namespace model;
class PublishItem extends Model{
public function __construct(){
   parent::__construct();
   $this->setTablename("publish_item"); 
}


public function addPublishItem($publisher,$infocate,$site,$actiontime,$detail){
echo "start to insert item to PublishItem";

$last_item_id = $this->database->insert($this->tablename, [
"id"=>md5(uniqid()),
"publisher"=>$publisher,
"infocate"=>$infocate,
"site"=>$site,
"actiontime"=>$actiontime,
"detail"=>$detail 
    ]);

return $last_item_id;



}


public function getPublish(){

$publishs=$this->database->select($this->tablename,"*");
return $publishs;


}






} 
