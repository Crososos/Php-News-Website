<?php

include("ayarlar.php");
$sil = $_POST["sil"];

if ($sil) {
    $silSorgu = $db->prepare("DELETE FROM haberler WHERE id=?");
    $silSorgu->execute([$sil]);
    if ($silSorgu) {
        echo 1;
    } else {
        echo 0;
    }
}

