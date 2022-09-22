<?php

$headers = [
  'accept: application/json',
  'Authorization: Bearer 14|OJBpDaVcZTIoggtiIH5LO2epc4Ir1UGlz9UOqyVR'
];

$ch = curl_init("https://owlengine.com/api/text/translate?content=yakin%20ga%20mau%20makan%20nasi%20sambil%20salto%20di%20sawah&language_from=id&language_to=en");

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response);
var_dump($data);