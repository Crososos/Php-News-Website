<?php
include('ayarlar.php');

$id = $_POST["id"];
$onay = '1';
var_dump($_POST);


$yorum = $db->prepare("UPDATE yorumlar SET onaylama=? WHERE id='$id'");
$yorum_onay = $yorum->execute(array($onay));