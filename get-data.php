<?php

$curl = curl_init();

$npsn = htmlspecialchars($_POST['npsn']);
$token = htmlspecialchars($_POST['token']);
$type = htmlspecialchars($_GET['type']);

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:5774/WebService/get' . $type . '?npsn=' . $npsn,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer ' . $token,
    'Cookie: killme=dont'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
