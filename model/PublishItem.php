<?php
namespace model;
class PublishItem extends Model{

private  const anonymity='00000000000000000000000000000000';
public function __construct(){
   parent::__construct();
   $this->setTablename("publish_item"); 
}


public function addPublishItem($infocate,$detail,$site="",$actiontime="",$publisher=PublishItem::anonymity){
$id=md5(uniqid());
$inputdata=[
"id"=>$id,
"publisher"=>$publisher,
"infocate"=>$infocate,
"site"=>$site,
"actiontime"=>$actiontime,
"detail"=>$detail 
    ];
$this->database->insert($this->tablename,$inputdata);
return $id;
}

public function delPublishItem($id){
$this->database->delete($this->tablename, [
"id"=>$id
]);

}

public function getAllPublish(){
$publishs=$this->database->select($this->tablename,"*");
return $publishs;
}
public function getPublish($id=null){
if($id==null)
return $this->getAllPublish();
else{
$publish=$this->database->select($this->tablename,"*",["id"=>$id]);
return $publish;
}
}






} 
