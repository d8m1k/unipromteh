<?php
defined('IN_SITE') or die;

require 'smarty/Smarty.class.php';

class SmartyMy extends Smarty {
    function __construct() {
        parent::__construct();

        $this->setTemplateDir('design/');
        $this->setCompileDir('cache/templates_c/');
        $this->setConfigDir('config/');
        $this->setCacheDir('cache/cache/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->caching = Smarty::CACHING_OFF;
    }
}