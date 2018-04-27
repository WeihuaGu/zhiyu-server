<?php 
Flight::route('/database/info',function(){
$data=Flight::get('database');
$info=$data->info();
foreach($info as $item){
echo $item;
echo '</br>';
}
});

