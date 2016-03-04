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
$job_array = array();
foreach($job_json as $key => $val) {

    $job_array[$key] = json_encode($val);
}
$client->hmset($key_prefix, $job_array);

$st = microtime(true);
for ($i = 0; $i < 1000; $i++) {
    $client->hmset($key_prefix, array(
        'position_title' => $key_prefix . ' ' . $i . ' Engineer Sr',
        'max_monthly_salary' =>  $i . '000',
        'min_monthly_salary' => $i . '00',
        'job_description' => 'Talents Candidate Candidate Candidate Candidate Can Candidate Candidate Mu must possess at least a Higher Secondary\/Pre-U\/&quot;A&quot; Level, any field. At least 3 year(s) of working experience in the related field is required for this position.Preferably Senior Executives specializing in Actuarial Science\/Statistics, IT\/Computer - Network\/System\/Database Admin or equivalent.Full-Time position(s) available.',
        'company_name' => $key_prefix . ' ' . $i . ' Company A',
        'skills' => '{"code":2,"name":"Posted"}',
        'years_of_experience' => '{"code":4,"name":"4"}',
        'specializations' => '{"code":131,"name":"IT Software"}',
        'job_status' => '{"code":2,"name":"Open"}',
        'status' => '{"code":2,"name":"Posted"}',

    ));
}
$et = microtime(true);

$r = $client->info();

echo 'Totol Time: ' . round(($et - $st), 4) . 's<br><br>';
print_r($r);
echo '<br><br>';
