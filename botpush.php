<?php



require "vendor/autoload.php";

$access_token = 's7AnCXSknenJygIrjf7JmoXdUbWV5/Ox/1INwr7NK+ooRMLgPfq/3QGejdu4f/ilKwXWqkW6Ipa/1KyXbb2vH7LQRohMSJ84BdqpKsKk2XiRZXPtqMcjLVX3fY8WQ1vDrsgUjvibEeH5JAB9BqgpcQdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'cbc34976594c98e7d1a3bd4d8065bd2f';

$pushID = 'U101c9f71ca9527c9f0ea3b3d204df04f';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







