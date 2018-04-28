<?php
    // 如果你使用php的依赖安装。可以使用以下方法自动载入
    require 'vendor/autoload.php';
    // Using Medoo namespace
    use Medoo\Medoo; 
    class MedooDatabase{

    private static $instance; 
    private static $database;
	
    public static function getInstance()  
    {  
        if (!(self::$instance instanceof self))  
        {  
            self::$instance = new self();  
        }  
        return self::$instance;  
    }  
    private function __construct()  
    {  
    }  
      
    /** 
     * Description:私有化克隆函数，防止外界克隆对象 
     */  
    private function __clone()  
    {  
    }  

    public function getMedoo(){
	 // 初始化配置
    if(empty(self::$database))
    self::$database = new medoo(require 'databaseconf.php'
    );
     
    return self::$database;


    }
    







   }
   

