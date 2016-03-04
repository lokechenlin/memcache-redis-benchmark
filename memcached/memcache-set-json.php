<?php
///usr/local/memcached-1.4.25/bin/memcached -d -m 6144 -p 11215 -u root -c 2048

echo '<pre>';

$m = new Memcached();
$m->addServers(array(
    array('192.168.33.51', 11215)
));

$key_prefix = 'dummyfortest6';
$job_json = file_get_contents('./job.json');
$job_json = json_decode($job_json);
$job_json = json_encode($job_json);

$st = microtime(true);
for ($i = 0; $i < 1000; $i++) {
    $key = $key_prefix . $i . $st;
    $m->set($key, $job_json, 1000);
}
$et = microtime(true);

$r = $m->getStats();
$m->quit();

echo 'Totol Time: ' . round(($et - $st), 4) . 's<br><br>';
print_r($r);
echo '<br><br>';


