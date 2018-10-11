<?php
$access_token = 's7AnCXSknenJygIrjf7JmoXdUbWV5/Ox/1INwr7NK+ooRMLgPfq/3QGejdu4f/ilKwXWqkW6Ipa/1KyXbb2vH7LQRohMSJ84BdqpKsKk2XiRZXPtqMcjLVX3fY8WQ1vDrsgUjvibEeH5JAB9BqgpcQdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;