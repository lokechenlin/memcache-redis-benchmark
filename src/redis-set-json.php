<?php
echo '<pre>';

require '../vendor/autoload.php';

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '192.168.33.51',
    'port'   => 6379,
]);

$key_prefix = 'dummyfortest6';
$job_json = file_get_contents('./job.json');
$job_json = json_decode($job_json, 1);
$job_json_encode = json_encode($job_json);
$job_array = array();
foreach($job_json as $key => $val) {

    $job_array[$key] = json_encode($val);
}

$st = microtime(true);
for ($i = 0; $i < 1000; $i++) {
    $key = $key_prefix . $i . $st;
    //$client->setex($key, 1000, $job_json_encode);
    $client->hmset($key, $job_array);
}
$et = microtime(true);

$r = $client->info();

echo 'Totol Time: ' . round(($et - $st), 4) . 's<br><br>';
print_r($r);
echo '<br><br>';


