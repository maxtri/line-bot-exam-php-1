<?php
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder ;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;


$API_URL = 'https://api.line.me/v2/bot/message/reply';
$ACCESS_TOKEN = '80IRGAhKUtOhQDsoZVNiUzBuN1XW6s80sTqwCP25Zfv/gJcLdNFP2Hr4rWkH0bT1KwXWqkW6Ipa/1KyXbb2vH7LQRohMSJ84BdqpKsKk2Xh92bUt6xEXxh7xHO7q/SjGkAlD42/maI/+vsPwqVInawdB04t89/1O/w1cDnyilFU='; // Access Token ค่าที่เราสร้างขึ้น
$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);
$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

if ( sizeof($request_array['events']) > 0 )
{
 foreach ($request_array['events'] as $event)
 {
  $reply_message = '';
  $reply_token = $event['replyToken'];

  if ($event['type'] == 'message' ) 
  {
   if($event['message']['type'] == 'text' )
   {
    $text = $event['message']['text'];
    switch ($text) {
      case 'A':
      $reply_message = 'แสดง A';
      break;
      case 'B':
      $reply_message = 'แสดง B';
      break;
      case 'C':
      $$replyData = new TemplateMessageBuilder('Confirm Template',
        new ConfirmTemplateBuilder(
          'Confirm template builder',
          array(
            new MessageTemplateActionBuilder(
              'Yes',
              'Text Yes'
            ),
            new MessageTemplateActionBuilder(
              'No',
              'Text NO'
            )
          )
        )
      );
      break;
      default:
      $textReplyMessage = '';
      break; 
    }
  }
}

if(strlen($reply_message) > 0)
{
   //$reply_message = iconv("tis-620","utf-8",$reply_message);
 $data = [
  'replyToken' => $reply_token,
  'messages' => [['type' => 'text', 'text' => $reply_message,'text'=>$$replyData]]
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
