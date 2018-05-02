<?php

use model\Token;
use model\Publish;
require_once 'common.php';

Flight::route('GET /list/publish', function(){
$publish=new Publish();
$list=$publish->getPublishs();
Flight::json(array('code'=>200,'desc'=>'published list','data'=>$list));
});



