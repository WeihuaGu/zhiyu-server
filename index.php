<?php
require 'vendor/autoload.php';

$database=require 'database.php';
Flight::set('database', $database);


Flight::route('/', function(){
    echo '你好，志趣';
});

//数据库相关路由
require 'routedatabase.php';

Flight::start();
