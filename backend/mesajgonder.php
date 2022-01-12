<?php
include('../panel/backend/ayarlar.php');
// include('ayarlar.php');

$isim = $_POST["isim"];
$konu = $_POST["konu"];
$mail = $_POST["mail"];
$mesaj = $_POST["mesaj"];
$kayit_tarihi = date("Y-m-d");
var_dump($_POST);

// Hiç durmadan hata verince alttaki sql sistemini denedim
$sql="INSERT INTO `mesajlar`(`isim`, `mail`, `konu`, `mesaj`, `tarih`) VALUES ('$isim','$mail','$konu','$mesaj','$kayit_tarihi')";
$db->query($sql);
// $mesajekle = $mesaj->execute(array($isim, $mail, $konu, $mesaj, $kayit_tarihi));
