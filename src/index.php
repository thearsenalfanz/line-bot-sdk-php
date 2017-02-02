<?php
// include('./LINEBot/HTTPClient/CurlHTTPClient.php');
// include('./LINEBot.php');
spl_autoload_register(function ($class_name) {
	$file_name = substr($class_name, 4, strlen($class_name));
	$file_name = str_replace($file_name,'\\','/');
	var_dump($class_name);
	echo "<br><br>";
	var_dump($file_name);
	// include $file_name . '.php';
});
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('P3avdIxyxnYbA4xJmyGCWyD2zg5Yi785QZIKdXNajsJV/t8zQKRqfLus2MmwarjTq8jUlLtx1p/YhF+R7tRCv0aQOia3KQhIkPR2PL45xst9NCURrzMXPoVqI0oVFZ1To6tHwSwCeJg0QuXo7HyYuAdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '1f96bb225b40366566a84317e187ae1c']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$content = file_get_contents('php://input');
	$event = $bot->parseEventRequest($content, $_SERVER['HTTP_X_LINE_SIGNATURE']);
// $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage($event['replyToken'], "hello!");
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}
else
{
	echo $response->getHTTPStatus . ' ' . $response->getRawBody();
}
}
?>
