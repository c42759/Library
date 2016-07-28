<?php

/* FIRST EXAMPLE */
$url = URL_TO_RECEIVING_PHP;

$fields = array(
	'PARAM1'=>$_POST['PARAM1'],
	'PARAM2'=>$_POST['PARAM2']
);

$postvars='';
$sep='';

foreach($fields as $key=>$value) {
	$postvars.= $sep.urlencode($key).'='.urlencode($value);
	$sep='&';
}

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$result = curl_exec($ch);

curl_close($ch);

print $result;

/* SECOND EXAMPLE */
$url = 'http://server.com/path';
$data = array('key1' => 'value1', 'key2' => 'value2');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);