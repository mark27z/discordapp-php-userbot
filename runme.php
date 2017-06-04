<?php
function getMessages($chatchannel) {
$sessions = file("bot.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
foreach ($sessions as $session) {
$tag = explode("|", $session);
$cookie = $tag[0];
$authtoken = $tag[1];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://discordapp.com/api/v6/channels/$chatchannel/messages?limit=1");
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = "Connection: keep-alive";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0";
$headers[] = "Referer: https://discordapp.com/channels/$chatchannel/";
$headers[] = "Cookie: $cookie";
$headers[] = "Authorization: $authtoken";
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
$output = curl_exec($curl);
curl_close($curl);
return "$output\n\n";
}
}

function sendChannelMessage ($channel, $msg) {
$sessions = file("bot.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
foreach ($sessions as $session) {
$tag = explode("|", $session);
$cookie = $tag[0];
$authtoken = $tag[1];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://discordapp.com/api/v6/channels/$channel/messages");
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = "Connection: keep-alive";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0";
$headers[] = "Content-Type: application/json;charset=utf-8";
$headers[] = "Referer: https://discordapp.com/channels/$channel/";
$headers[] = "Cookie: $cookie";
$headers[] = "Authorization: $authtoken";
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POST, 1);
$requ3st = array("content" => $msg, "nonce" => $channel);
$requ3st_encoded = json_encode($requ3st);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requ3st_encoded);
$output = curl_exec($curl);
curl_close($curl);
return $output;
}
}

function editChannelMessage ($channel, $msgtoedit, $newmsg) {
$sessions = file("bot.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
foreach ($sessions as $session) {
$tag = explode("|", $session);
$cookie = $tag[0];
$authtoken = $tag[1];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://discordapp.com/api/v6/channels/$channel/messages/$msgtoedit");
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = "Connection: keep-alive";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0";
$headers[] = "Content-Type: application/json;charset=utf-8";
$headers[] = "Referer: https://discordapp.com/channels/$channel/$msgtoedit";
$headers[] = "Cookie: $cookie";
$headers[] = "Authorization: $authtoken";
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
curl_setopt($curl, CURLOPT_POST, 1);
$requ3st = array("content" => $newmsg,);
$requ3st_encoded = json_encode($requ3st);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requ3st_encoded);
$output = curl_exec($curl);
curl_close($curl);
return $output;
}
}

function deleteChannelMessage ($channel, $msg) {
$sessions = file("bot.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
foreach ($sessions as $session) {
$tag = explode("|", $session);
$cookie = $tag[0];
$authtoken = $tag[1];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://discordapp.com/api/v6/channels/$channel/messages/$msg");
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = "Connection: keep-alive";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0";
$headers[] = "Content-Type: application/json;charset=utf-8";
$headers[] = "Referer: https://discordapp.com/channels/$channel/";
$headers[] = "Cookie: $cookie";
$headers[] = "Authorization: $authtoken";
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
$output = curl_exec($curl);
curl_close($curl);
return $output;
}
}

function setStatus ($status) {
$sessions = file("bot.txt", FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
foreach ($sessions as $session) {
$tag = explode("|", $session);
$cookie = $tag[0];
$authtoken = $tag[1];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://discordapp.com/api/v6/users/@me/settings");
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = "Connection: keep-alive";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0";
$headers[] = "Content-Type: application/json;charset=utf-8";
$headers[] = "Cookie: $cookie";
$headers[] = "Authorization: $authtoken";
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
$requ3st = array("status" => $status,);
$requ3st_encoded = json_encode($requ3st);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requ3st_encoded);
$output = curl_exec($curl);
curl_close($curl);
return $output;
}
}

function orario($m) {
	return strtotime($m[0]['timestamp']);
}


$a = array();
$k = "INSERT_CHANNEL";
while(1) {
$getmessages = getMessages($k);
$msgid = json_decode($getmessages, true)[0]['id'];
$text = json_decode($getmessages, true)[0]['content'];
$uid = json_decode($getmessages, true)[0]['author']['id'];
if(!in_array($msgid, $a)) {
	array_push($a, $msgid);
	include 'cmd.php';
	echo "$getmessages\n\n";
}
else {
	continue;
}
}
?>
