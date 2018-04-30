<?php
require 'vendor/autoload.php';

//$database=require 'database.php';
//Flight::set('database', $database);


Flight::route('/', function(){
    echo '你好，志遇';
});

//数据库相关路由
require './route/routedatabase.php';

//认证与用户
require './route/routeauth.php';
require './route/routeuser.php';

Flight::start();
