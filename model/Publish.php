<?php
namespace model;

class Publish{

public function anonymityPublish($infocate,$detail,$site="",$actiontime=""){
$item=new PublishItem();
$publieditem=$item->addPublishItem($infocate,$detail,$site,$actiontime);
return $publieditem;
}


public function publishItem($infocate,$detail,$site,$actiontime,$publisher){
if(!$this->validUser($publisher)){
echo "user not exits";
return null;
}
if(!$this->validCategory($infocate)){
echo "cate not exits";
return null;
}
$item=new PublishItem();
$publieditem=$item->addPublishItem($infocate,$detail,$site,$actiontime,$publisher);
print_r($publishitem);
return $publishitem;

}

public function getPublishs(){
return (new PublishItem())->getPublish();

}

public function validUser($userid){

$user=new User();
$info=$user->getUserInfo($userid);
if(empty($info))
return false;
else
return true;
}

public function validCategory($category){

$category=new Category();
if($category->isCategoryById(101))
return true;
else
return false;

}











} 
