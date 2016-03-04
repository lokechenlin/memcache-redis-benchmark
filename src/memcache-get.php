<?php

echo '<pre>';

$m = new Memcached();
$m->addServers(array(
    array('192.168.33.51', 11215)
));

$key_prefix = 'dummyfortest6';
$long_string_5000_char = str_repeat('a', 5000);
$m->set($key_prefix, $long_string_5000_char, 300);

$st = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    $r = $m->get($key_prefix);
}
$et = microtime(true);

echo 'Totol Time: ' . round(($et - $st), 4) . 's<br><br>';
print_r($r);
echo '<br><br>';
$m->quit();