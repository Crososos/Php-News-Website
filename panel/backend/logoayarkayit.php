<?php

include("resimclass.php");

include('ayarlar.php');

$isim = $_POST["isim"];

$resim = $_FILES['ust_logo']['tmp_name'];
$resimIsim = $_FILES['ust_logo']['name'];
$target = "../../resimler/" . $resimIsim;

$logo = $_FILES['site_logo']['tmp_name'];
$logoIsim = $_FILES['site_logo']['name'];
$hedef = "../../resimler/" . $logoIsim;

$isime = $db->prepare("UPDATE logoayar SET site_isim=? WHERE id='1'");
$isimedegis = $isime->execute(array($isim));
if ($resimIsim != "") {

    if (move_uploaded_file($resim, $target)) {

        $hakkimizda = $db->prepare("UPDATE logoayar SET site_logo=?,logo=? WHERE id='1'");
        $hakkimizdadegis = $hakkimizda->execute(array($resimIsim, $logoIsim));

        $image = new SimpleImage();
        $image->load($target);
        $image->resize(1900, 800);
        $image->save($target);

        $image = new SimpleImage();
        $image->load($hedef);
        $image->resize(1900, 800);
        $image->save($hedef);
    }
}

