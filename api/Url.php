<?php
defined('IN_SITE') or die;

class Url{
    private $url;
    private $pages;

    function __construct() {
        $this->url = rtrim(preg_replace('/\?.*/','',substr($_SERVER['REQUEST_URI'],1)),'/');
        $this->pages = preg_split('/\//', $this->url);
    }
    function GetTemplate($menu){
        $r = $this->pages[0];

        if (empty($this->pages[0]))
            $r = 'main';
        else if (!array_key_exists($r, $menu))
            $r= '404';

        return $r;
    }
    function CurIndex($menu){
        $r = $this->pages[0];
        if (!array_key_exists($r, $menu))
            $r= '404';
        return $r;
    }
    function CurPage(){
        return $this->pages[0];
    }
}
