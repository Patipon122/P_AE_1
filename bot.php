php
$access_token = 'z0S/egyN8VF0kBchfpDsIhw7rhPhrdLrI23elhWabjKHFqUOemBpxB95AJyFN2yOBUYUGRDwo5eM/cWje44uSR4x17xBvlvL1kfwsK808eXTIakT5jVUc0hFqXRLkey+rCge/8bJPEfZqnHYgtXI2QdB04t89/1O/w1cDnyilFU=';

 Get POST body content
$content = file_get_contents('phpinput');
 Parse JSON
$events = json_decode($content, true);
 Validate parsed JSON data
if (!is_null($events['events'])) {
	 Loop through each event
	foreach ($events['events'] as $event) {
		 Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			 Get text sent
			$text = $event['message']['text'];
			 Get replyToken
			$replyToken = $event['replyToken'];

			 Build message to reply back
			$messages = [
				'type' = 'text',
				'text' = $text
			];

			 Make a POST Request to Messaging API to reply to sender
			$url = 'httpsapi.line.mev2botmessagereply';
			$data = [
				'replyToken' = $replyToken,
				'messages' = [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type applicationjson', 'Authorization Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, POST);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . rn;
		}
	}
}
echo OK;