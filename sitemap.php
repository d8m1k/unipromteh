<?php
defined('IN_SITE') or die;

require 'api/Config.php';
require 'api/Db.php';
require 'api/Menu.php';

$protocol = $_SERVER['REQUEST_SCHEME'];
$site = $_SERVER['HTTP_HOST'];
$menu = new Menu();

header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($menu->getOnlyVisible() as $name => $item){
    echoUrl($name,0.5);
}
echo '</urlset>';


function echoUrl($url, $priority){
    global $protocol;
    echo '	<url>'."\n";
    echo '		<loc>'.$protocol.'://' . $_SERVER['SERVER_NAME']. ($url=='' ?'':'/'. $url) . '</loc>'."\n";
    echo '		<priority>' . $priority . '</priority>'."\n";
    echo '	</url>'."\n";
}

exit;