<?php 
require_once 'vendor/autoload.php';

use model\Model;

Flight::route('/database/info',function(){
$model=new Model();
$info=$model->databaseInfo();
});

