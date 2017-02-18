<html>
<header>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset='utf-8'\">
	<title></title>
	<script>
		vSpecialId = 'test';
	</script>
</header>
<body>
<?php
phpinfo();
//xdebug_dump_superglobals();
echo '<h1>Подключенные расширения</h1><PRE>';
print_r(get_loaded_extensions());
echo '</PRE>';
echo '<h1>$_SERVER</h1><PRE>';
print_r($_SERVER);
echo '</PRE>';

function printDetails($status){
    echo '<h1>Memcache::getStats()</h1>';
    echo "<table border='1'>";
    echo "<tr><td>Memcache Server version:</td><td> ".$status ["version"]."</td></tr>";
    echo "<tr><td>Process id of this server process </td><td>".$status ["pid"]."</td></tr>";
    echo "<tr><td>Number of seconds this server has been running </td><td>".$status ["uptime"]."</td></tr>";
    echo "<tr><td>Accumulated user time for this process </td><td>".$status ["rusage_user"]." seconds</td></tr>";
    echo "<tr><td>Accumulated system time for this process </td><td>".$status ["rusage_system"]." seconds</td></tr>";
    echo "<tr><td>Total number of items stored by this server ever since it started </td><td>".$status ["total_items"]."</td></tr>";
    echo "<tr><td>Number of open connections </td><td>".$status ["curr_connections"]."</td></tr>";
    echo "<tr><td>Total number of connections opened since the server started running </td><td>".$status ["total_connections"]."</td></tr>";
    echo "<tr><td>Number of connection structures allocated by the server </td><td>".$status ["connection_structures"]."</td></tr>";
    echo "<tr><td>Cumulative number of retrieval requests </td><td>".$status ["cmd_get"]."</td></tr>";
    echo "<tr><td> Cumulative number of storage requests </td><td>".$status ["cmd_set"]."</td></tr>";

    $percCacheHit=((real)$status ["get_hits"]/ (real)$status ["cmd_get"] *100);
    $percCacheHit=round($percCacheHit,3);
    $percCacheMiss=100-$percCacheHit;

    echo "<tr><td>Number of keys that have been requested and found present </td><td>".$status ["get_hits"]." ($percCacheHit%)</td></tr>";
    echo "<tr><td>Number of items that have been requested and not found </td><td>".$status ["get_misses"]."($percCacheMiss%)</td></tr>";
    echo "<tr><td>Total number of bytes read by this server from network </td><td>".$status["bytes_read"]." Bytes</td></tr>";
    echo "<tr><td>Total number of bytes sent by this server to network </td><td>".$status["bytes_written"]." Bytes</td></tr>";
    echo "<tr><td>Number of bytes this server is allowed to use for storage.</td><td>".$status["limit_maxbytes"]." Bytes</td></tr>";
    echo "<tr><td>Number of valid items removed from cache to free memory for new items.</td><td>".$status ["evictions"]."</td></tr>";
    echo "</table>";

}

//$memcache = new Memcache;
//$memcache->connect('localhost', 11211);
//printDetails($memcache->getStats());
////$memcache->set('key','value', FALSE, 300);
//echo $memcache->get('key');

?>
</body>
</html>