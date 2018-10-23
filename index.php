<?php

$API_URL = 'https://api.line.me/v2/bot/message/reply';
$ACCESS_TOKEN = '80IRGAhKUtOhQDsoZVNiUzBuN1XW6s80sTqwCP25Zfv/gJcLdNFP2Hr4rWkH0bT1KwXWqkW6Ipa/1KyXbb2vH7LQRohMSJ84BdqpKsKk2Xh92bUt6xEXxh7xHO7q/SjGkAlD42/maI/+vsPwqVInawdB04t89/1O/w1cDnyilFU='; // Access Token ค่าที่เราสร้างขึ้น
$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);
$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array



if (sizeof($request_array['events']) > 0 )
{
 foreach ($request_array['events'] as $event)
 {
  $reply_message = '';
  $reply_token = $event['replyToken'];

  if ($event['type'] == 'message' ) 
  {
   if($event['message']['type'] == 'text' )
   {
    $textname = $event['source']['userId']; // เอา user id ของแต่ละคนที่ทักมาหาบอทตัวนี้เก็บไว้
    $text = $event['message']['text'];
    switch ($text) {
      case 'A':
      $reply_message = 'แสดง A '.$textname.'';
      break;
      case 'B':
      $reply_message = 'แสดง B '.$textname.'';
      break;
      default:
      $reply_message = ''.$textname.'';
      break; 
    }
  }
}else{
  {
    "type": "template",
    "altText": "this is a buttons template",
    "template": {
      "type": "buttons",
      "thumbnailImageUrl": "https://example.com/bot/images/image.jpg",
      "title": "Menu",
      "text": "Please select",
      "actions": [
        {
          "type": "postback",
          "label": "Buy",
          "data": "action=buy&itemid=123"
        },
        {
          "type": "postback",
          "label": "Add to cart",
          "data": "action=add&itemid=123"
        },
        {
          "type": "uri",
          "label": "View detail",
          "uri": "http://example.com/page/123"
        }
      ]
    }
  }
}

if(strlen($reply_message) > 0)
{
   //$reply_message = iconv("tis-620","utf-8",$reply_message);
 $data = [
  'replyToken' => $reply_token,
  'messages' => [['type' => 'text', 'text' => $reply_message]]
];
$post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

$send_result = send_reply_message($API_URL, $POST_HEADER, $post_body);
echo "Result: ".$send_result."\r\n";
}
}
}

echo "OK test";

function send_reply_message($url, $post_header, $post_body)
{
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 $result = curl_exec($ch);
 curl_close($ch);

 return $result;
}

?>
