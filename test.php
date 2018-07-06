<?php
require_once './vendor/autoload.php';


use model\PublishItem;
$pub=new PublishItem();
$input=$pub->addPublishItem(101,"fuck women");

print_r($input);
/**
use model\Category;
print_r(Category::getInstance()->getAllCategory());
**/
