<?php
$access_token = 'z0S/egyN8VF0kBchfpDsIhw7rhPhrdLrI23elhWabjKHFqUOemBpxB95AJyFN2yOBUYUGRDwo5eM/cWje44uSR4x17xBvlvL1kfwsK808eXTIakT5jVUc0hFqXRLkey+rCge/8bJPEfZqnHYgtXI2QdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;