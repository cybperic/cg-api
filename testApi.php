<?php
require __DIR__ . '/vendor/autoload.php';
use Curl\Curl;

$curl = new Curl();
$curl->setHeader('Authorization', 'Bearer 12345678901234567890');
$url = "http://condorgaming.com/api/getStatistics/16";

$curl->get($url);

if ($curl->error)
{
    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
}
else
{
    echo 'Response:' . "\n";
    print_r($curl->response);
}



