<?php
include('ayarlar.php');

$adres = $_POST["adres"];
$tel_no = $_POST["tel_no"];
$e_posta = $_POST["e_posta"];

$iletisim = $db->prepare("UPDATE iletisim SET adres=?,tel_no=?,e_posta=? WHERE id='1'");
$iletisimayar = $iletisim->execute(array($adres, $tel_no, $e_posta));