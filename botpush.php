<?php



require "vendor/autoload.php";

$access_token = 'uITRzOnkuQUCW8Xz2d7I1SaFjIoNsH/bmxVfrGzF5D6kHFXisyKodwY9B9M4+eHRzQDtzn/uK48aTSqkcEcOVX01DTiCOpHh9jG4IsiY3GPoYl7w/x/vpKY1G6iczgLcUey2saC4XyjowOkGl6F7OwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'cbc34976594c98e7d1a3bd4d8065bd2f';

$pushID = 'U101c9f71ca9527c9f0ea3b3d204df04f';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







