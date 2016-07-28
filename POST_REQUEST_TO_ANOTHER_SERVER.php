<?php

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