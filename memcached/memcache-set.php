<?php
///usr/local/memcached-1.4.25/bin/memcached -d -m 512 -p 11215 -u root

echo '<pre>';

$m = new Memcached();
$m->addServers(array(
    array('192.168.33.51', 11215)
));

//String
$long_string_5000_char = str_repeat('a', 5000);
$key_prefix = 'dummyfortest6';

$st = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    $key = $key_prefix . $i . $st;
    $m->set($key, $long_string_5000_char, 300);
}
$et = microtime(true);

$r = $m->getStats();
$m->quit();

echo 'Totol Time: ' . round(($et - $st), 4) . 's<br><br>';
print_r($r);
echo '<br><br>';


