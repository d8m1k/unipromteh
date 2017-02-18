<?php
define('IN_SITE', 7);

date_default_timezone_set('Europe/Moscow');

if ($_SERVER['REQUEST_URI']=='/robots.txt') require 'robots.php';
if ($_SERVER['REQUEST_URI']=='/sitemap.xml') require 'sitemap.php';

require 'api/Config.php';
require 'api/Db.php';
require 'api/Url.php';
require 'api/Menu.php';
require 'api/SmartyMy.php';

$smarty = new SmartyMy();
$url = new Url();

$menu = new Menu();
$menuArray=$menu->getOnlyVisible();

$template = $url->GetTemplate($menu->getOnlyVisible());
if ($template=='404') header("HTTP/1.0 404 Not Found");
$cur_page = $menu->menu[$url->CurIndex($menu->menu)];
$smarty->assign('ver',IN_SITE);
$smarty->assign('template',$template);
$smarty->assign('cur_page', $cur_page);
$smarty->assign('menu',$menu->getOnlyVisible());
$smarty->assign('title',$menu->menu[$url->CurIndex($menu->getOnlyVisible())]['name']);

$content = $smarty->fetch($template.'.tpl');
$smarty->assign('content', $content);
$smarty->display('index.tpl');