<?php
defined('IN_SITE') or die;

class Config{
    private static $instance;
    private $ini;

    private function __construct(){
        $this->ini =  parse_ini_file(dirname(dirname(__FILE__)).'/config/config.php');
    }

    public static function GetInstance(){
        if (is_null(self::$instance))
            self::$instance = new Config;
        return self::$instance;
    }

    public function param($name){
        return $this->ini[$name];
    }
}