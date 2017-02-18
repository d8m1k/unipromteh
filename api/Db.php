<?php
defined('IN_SITE') or die;

class DbManager{
    private static $instance;
    private $config;
    public $mysqli;

    private function __construct(){
        $this->config =  Config::GetInstance();

        $this->mysqli = new mysqli(
            $this->config->param('db_server'),
            $this->config->param('db_user'),
            $this->config->param('db_password'),
            $this->config->param('db_name')
        );
        $this->mysqli->set_charset('utf-8');
    }

    public static function GetInstance(){
        if (is_null(self::$instance))
            self::$instance = new DbManager;
        return self::$instance;
    }

    public function query_assocById($sql, $id='id'){
        $cursor = $this->mysqli->query($sql);
        $data = [];
        while ($res = $cursor->fetch_assoc()) {
            $data[$res[$id]] = $res;
        }
        $cursor->free();
        return $data;
    }
    public function query_assocByIdWithGroup($sql, $group, $id='id'){
        $cursor = $this->mysqli->query($sql);
        $data = [];
        while ($res = $cursor->fetch_assoc()) {
            $data[$res[$group]][$res[$id]] = $res;
        }
        $cursor->free();
        return $data;
    }
    function query_assocFirstRow($sql){
        $cursor = $this->mysqli->query($sql);
        $res = $cursor->fetch_assoc();
        $cursor->free();
        return $res;
    }
}