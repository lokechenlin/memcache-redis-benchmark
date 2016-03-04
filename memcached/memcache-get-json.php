<?php

//header('Content-Type: application/json; charset=utf8');
echo "<pre>";

$m = new Memcached();
$m->addServers(array(
    array('192.168.33.51', 11215)
));

$key_prefix = 'dummyfortest6';
$job_json = file_get_contents('./job.json');
$job_json = json_decode($job_json, 1);
$job_json = json_encode($job_json);
#$job_json = base64_encode($job_json);

$m->set($key_prefix, $job_json, 300);

$st = microtime(true);
for ($i = 0; $i < 1000; $i++) {
    $r = $m->get($key_prefix);
}
$et = microtime(true);

echo 'Totol Time: ' . round(($et - $st), 4) . 's<br><br>';
print_r($r);
echo '<br><br>';
$m->quit();