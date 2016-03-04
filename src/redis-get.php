<?php
echo '<pre>';

require '../vendor/autoload.php';

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '192.168.33.51',
    'port'   => 6379,
]);

//String
$key_prefix = 'dummyfortest6';
$long_string_5000_char = str_repeat('a', 5000);
$client->setex($key_prefix, 300, $long_string_5000_char);

$st = microtime(true);
for ($i = 0; $i < 10000; $i++) {

    $r = $client->get($key_prefix);
}
$et = microtime(true);

echo 'Totol Time: ' . round(($et - $st), 4) . 's<br><br>';
print_r($r);
echo '<br><br>';


