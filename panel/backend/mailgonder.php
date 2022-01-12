<?php
include('ayarlar.php');
$sth = $db->prepare("SELECT * FROM uyeler GROUP BY id");
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);

$konu = $_POST["konu"];
$icerik = $_POST["icerik"];
$icerik = wordwrap($icerik, 70, "\r\n");
$kime = $sth;

mail($kime, $konu, $icerik);


