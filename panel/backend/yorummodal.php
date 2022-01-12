<?php

include("ayarlar.php");

$updateme = $_POST["updateme"];

//Modal için olan kısım
if ($updateme) {
    $updateSorgu = $db->prepare("SELECT * FROM yorumlar WHERE id=?");
    $updateSorgu->execute([$updateme]);
    $yorumlar = $updateSorgu->fetch(pdo::FETCH_ASSOC);

    if ($yorumlar) {
        echo json_encode($yorumlar);
    } else {
        echo 0;
    }
}
