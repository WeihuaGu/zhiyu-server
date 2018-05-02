<?php

use model\Token;
use model\Publish;
use model\PublishItem;
require_once 'common.php';

Flight::route('POST /publish/', function(){
$uid=verifyToken();
if($uid!=null){
$publish=new Publish();
$bodyjson=getBodyJson();
$data=$bodyjson->data;
$last_item_id=$publish->publishItem($uid,$data->infocate,$data->site,$data->actiontime,$data->detail);
if($last_item_id==0)
Flight::json(array('code'=>200,'desc'=>'publish sucess','data'=>(new PublishItem())->getPublish()));
else
Flight::json(array('code'=>204,'desc'=>'publish faild'));
}
else
Flight::json(array('code'=>205,'desc'=>'token verify faild'));

});



