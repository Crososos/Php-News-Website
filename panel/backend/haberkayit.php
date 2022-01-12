<?php

include("resimclass.php");

include('ayarlar.php');

$baslik = $_POST["baslik"];
$kaynak = $_POST["kaynak"];
$yazar = $_POST["yazar"];
$haber_turu = $_POST["haber_turu"];
$icerik = $_POST["icerik"];
$ozet = $_POST["ozet"];
$kayit_tarihi = date("Y-m-d");

// var_dump($_POST);

//resim ekleme kısmı

$resim = $_FILES['resim']['tmp_name'];
$resimIsim = $_FILES['resim']['name'];
$target = "../../resimler/" . $resimIsim;
if ($resimIsim != "") {
    if ($haber_turu == 1) {
        $haber_turu = "spor";
    }
    if ($haber_turu == 2) {
        $haber_turu = "siyaset";
    }
    if ($haber_turu == 3) {
        $haber_turu = "teknoloji";
    }
    if ($haber_turu == 4) {
        $haber_turu = "ekonomi";
    }
    if ($haber_turu == 5) {
        $haber_turu = "eğitim";
    }
    if ($haber_turu == 6) {
        $haber_turu = "hayat";
    }

    if (move_uploaded_file($resim, $target)) {

        $haber = $db->prepare("INSERT INTO haberler(baslik,icerik,kaynak,yazar,haber_turu,tarih,resim,ozet) Values (?,?,?,?,?,?,?,?)");
        $haberekle = $haber->execute(array($baslik, $icerik, $kaynak, $yazar, $haber_turu, $kayit_tarihi, $resimIsim,$ozet));

        $image = new SimpleImage();
        $image->load($target);
        $image->resize(1900, 800);
        $image->save($target);
    }
}
