<?php
include('ayarlar.php');

$facebook = $_POST["facebook"];
$twitter = $_POST["twitter"];
$instagram = $_POST["instagram"];
$youtube = $_POST["youtube"];

$sosyalmedya = $db->prepare("UPDATE sosyalmedya SET facebook=?,twitter=?,instagram=?,youtube=? WHERE id='1'");
$sosyalmedyaayar = $sosyalmedya->execute(array($facebook, $twitter, $instagram,$youtube));