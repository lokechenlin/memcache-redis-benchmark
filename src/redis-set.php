<?php
echo '<pre>';

require '../vendor/autoload.php';

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '192.168.33.51',
    'port'   => 6379,
]);

//String
$long_string_5000_char = str_repeat('a', 5000);
$key_prefix = 'dummyfortest6';

$st = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    $key = $key_prefix . $i . $st;
    $client->setex($key, 300, $long_string_5000_char);
}
$et = microtime(true);

$r = $client->info();

echo 'Totol Time: ' . round(($et - $st), 4) . 's<br><br>';
print_r($r);
echo '<br><br>';


