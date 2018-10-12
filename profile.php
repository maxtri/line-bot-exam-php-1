<?php


$access_token = 'uITRzOnkuQUCW8Xz2d7I1SaFjIoNsH/bmxVfrGzF5D6kHFXisyKodwY9B9M4+eHRzQDtzn/uK48aTSqkcEcOVX01DTiCOpHh9jG4IsiY3GPoYl7w/x/vpKY1G6iczgLcUey2saC4XyjowOkGl6F7OwdB04t89/1O/w1cDnyilFU=';

$userId = 'Uffa138efe037e6e889d0b0f4a871c005';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

