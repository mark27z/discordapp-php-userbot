<?php
//include 'af.php';
$c = "INSERT_CHANNEL";
if ($text == "*hi") {
	sendChannelMessage($c, "Hi, I'm on!");
}
if (stripos($text, "*echo") === 0) {
	$esplode = explode("*echo ", $text);
	$dopo = $esplode[1];
	sendChannelMessage($c, $dopo);
}
if (stripos($text, "*gethostbyname") === 0) {
	setStatus("dnd");
	$esplode = explode("*gethostbyname ", $text);
	$dopo = $esplode[1];
	$send = sendChannelMessage($c, "Just a moment..");
	$omg = json_decode($send, true)['id'];
	$getbyname = gethostbyname($dopo);
	if ($dopo == "") {
		editChannelMessage($c, $omg, "Error.");
		return;
	}
	if ($getbyname == "") {
		editChannelMessage($c, $omg, "Error.");
		return;
	}
	editChannelMessage($c, $omg, $getbyname);
	setStatus("online");
}
?>