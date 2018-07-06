<?php
require 'vendor/autoload.php';
//欢迎
Flight::route('/', function(){
    echo '你好，志遇';
});


//配置Flight必要变量
Flight::set('httpcode', require './config/httpcode.php');

//路由
//数据库相关路由
require './route/routedatabase.php';
//认证与用户
require './route/routeauth.php';
require './route/routeuser.php';
//发布相关路由
require './route/routepublish.php';
//显示列表路由
require './route/routelist.php';


Flight::start();
