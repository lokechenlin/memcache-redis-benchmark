<?php

echo '<pre>';

$m = new Memcached();
$m->addServers(array(
    array('192.168.33.51', 11215)
));

$r = $m->getStats();
$m->quit();

print_r($r);
echo '<br><br>';
