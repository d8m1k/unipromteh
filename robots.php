<?php
defined('IN_SITE') or die;

require 'api/Config.php';
require 'api/Db.php';
require 'api/Menu.php';

$protocol = $_SERVER['REQUEST_SCHEME'];
$site = $_SERVER['HTTP_HOST'];
echo implode("\r\n", $site=='test.unipromteh.com'?
    [
        'User-agent: *',
        'Disallow: /'
    ] :
    [
    'User-agent: *',
    'Disallow: /debug',
    'Disallow: /old',
    'Host: '.$protocol.'://'.$site,
    '',
    'Sitemap: '.$protocol.'://'.$site.'/sitemap.xml',
]);

exit;