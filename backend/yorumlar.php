<?php
include('../panel/backend/ayarlar.php');

$isim = $_GET["isim"];
$mesaj = $_GET["mesaj"];
$mail = $_GET["mail"];
$haber_id = $_GET["haber_id"];
$haber_baslik = $_GET["haber_baslik"];
$kayit_tarihi = date("Y-m-d");
var_dump($_GET);

// $sql="INSERT INTO `yorumlar` (`isim`, `mail`, `haber_id`, `haber_bas`, `mesaj`, `tarih`) VALUES ('$isim', '$mail', '$haber_id', '$haber_baslik', '$mesaj', '$kayit_tarihi');";
// $db->query($sql);


$yorumlar = $db->prepare("INSERT INTO yorumlar(isim,mail,haber_id,haber_bas,mesaj,tarih) Values (?,?,?,?,?,?)");
$yorumlarekle = $yorumlar->execute(array($isim, $mail, $haber_id,$haber_baslik,$mesaj,$kayit_tarihi));
