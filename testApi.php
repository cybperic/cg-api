<?php

$url = "http://condorgaming.com/api/getStatistics/126";
$headers = array();
$headers[] = "Authorization: Bearer 12345678901234567890";


$response = createApiCall($url, "GET", $headers);
print_r($response);



function createApiCall($url, $method, $headers, $data = array())
{
    if ($method == 'PUT')
    {
        $headers[] = 'X-HTTP-Method-Override: PUT';
    }

    $headers = array_merge(array("Cache-Control: no-cache"), $headers);
    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($handle, CURLOPT_FRESH_CONNECT, true);

    switch($method)
    {
        case 'GET':
            break;
        case 'POST':
            curl_setopt($handle, CURLOPT_POST, true);
            curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
            break;
        case 'PUT':
            curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
            break;
        case 'DELETE':
            curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
    }
    $response = curl_exec($handle);
    return $response;
}