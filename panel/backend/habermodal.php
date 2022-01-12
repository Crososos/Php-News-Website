<?php

include("ayarlar.php");

$updateme = $_POST["updateme"];

//Modal için olan kısım
if ($updateme) {
    $updateSorgu = $db->prepare("SELECT * FROM haberler WHERE id=?");
    $updateSorgu->execute([$updateme]);
    $haberler = $updateSorgu->fetch(pdo::FETCH_ASSOC);

    if ($haberler) {
        echo json_encode($haberler);
    } else {
        echo 0;
    }
}
