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

   $r = $client->hmget($key_prefix, array(
       //First 10
       'position_title',
       'position_level',
       'field_of_studies',
       'advertisement_id',
       'max_monthly_salary',
       'salary_currency',
       'formatted_urls',
       'job_description',
       'qualifications',
       'profile_id',
       //Second 10
//       'years_of_experience',
//       'job_status',
//       'salary_display_flag',
//       'status',
//       'sites',
//       'work_location_desc',
//       'industry',
//       'company_name',
//       'end_date',
//       'application_deadline',
       //Last 10
//       'map',
//       'job_id',
//       'min_monthly_salary',
//       'work_locations',
//       'posting_date',
//       'selling_points',
//       'skills',
//       'advertiser_id',
//       'employment_types',
//       'specializations'
    ));
}
$et = microtime(true);

echo 'Totol Time: ' . round(($et - $st), 4) . 's<br><br>';
print_r($r);
echo '<br><br>';


