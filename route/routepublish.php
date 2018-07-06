<?php
use model\Token;
use model\Publish;
use model\PublishItem;
require_once 'common.php';

Flight::route('POST /anonymitypublish/', 'anonymityPublish');

function anonymityPublish(){
	$bodyjson=getBodyJson();
	if($bodyjson==null){
		Flight::json(array('desc'=>'bodyjson was null'),Flight::get('httpcode')['unprocessable']);
	}
	else{
		$data=$bodyjson->data;
		if($data==null | $data->infocate==null | $data->detail==null)
		Flight::json(array('desc'=>'anonymitypublish data was null'),Flight::get('httpcode')['unprocessable']);
		else{
		$publish=new Publish();	
		if($data->site==null | $data->actiontime==null){
			$published_id=$publish->anonymityPublish($data->infocate,$data->detail);
			Flight::json(array('desc'=>'publish sucess','data'=>(new PublishItem())->getPublish($published_id)),Flight::get('httpcode')['created']);

                }else{
		$published_id=$publish->anonymityPublish($data->infocate,$data->detail,$data->site,$data->actiontime);

		Flight::json(array('desc'=>'publish sucess','data'=>(new PublishItem())->getPublish($published_id)),Flight::get('httpcode')['created']);
		     }
		}
	}


}


Flight::route('POST /publish/', function(){
$uid=verifyToken();
if($uid!=null){
$publish=new Publish();
$bodyjson=getBodyJson();
$data=$bodyjson->data;
$last_item_id=$publish->publishItem($data->infocate,$data->detail,$data->site,$data->actiontime,$uid);
if($last_item_id==0)
Flight::json(array('code'=>200,'desc'=>'publish sucess','data'=>(new PublishItem())->getPublish()));
else
Flight::json(array('code'=>204,'desc'=>'publish faild'));
}
else
Flight::json(array('code'=>205,'desc'=>'token verify faild'));

});



