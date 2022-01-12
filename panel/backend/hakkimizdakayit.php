<?php

include("resimclass.php");

include('ayarlar.php');

$baslik = $_POST["baslik"];
$icerik = $_POST["icerik"];
$resim = $_FILES['resim']['tmp_name'];
$resimIsim = $_FILES['resim']['name'];
$target = "../../resimler/" . $resimIsim;
if ($resimIsim != "") {

    if (move_uploaded_file($resim, $target)) {

        $hakkimizda = $db->prepare("UPDATE hakkimizda SET baslik=?,aciklama=?,resim=? WHERE id='1'");
        $hakkimizdadegis = $hakkimizda->execute(array($baslik, $icerik, $resimIsim));

        $image = new SimpleImage();
        $image->load($target);
        $image->resize(1900, 800);
        $image->save($target);
    }
}

