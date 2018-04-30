<?php
namespace model;
class PublishItem extends Model{
public function __construct(){
   parent::__construct();
   $this->setTablename("publish_item"); 
}


public function addPublishItem($publisher,$infocate,$actiontime,$detail){
echo "start to insert item to PublishItem";
echo "publisheris".$publisher;
echo "infocate".$infocate;
echo "actiontime".$actiontime;
echo "detail".$detail;

$last_item_id = $this->database->insert($this->tablename, [

"publisher"=>$publisher,
"infocate"=>$infocate,
"actiontime"=>$actiontime,
"detail"=>$detail 
    ]);

echo $last_item_id->rowCount();
return $last_item_id;



}


public function getPublish(){

$publishs=$this->database->select($this->tablename,"*");
print_r($publishs);
return $publishs;


}






} 
