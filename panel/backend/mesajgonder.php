<?php

include("ayarlar.php");

$updateme = $_POST["updateme"];

//Modalda mail adresi otomatik yazmasi icin
if ($updateme) {
    $updateSorgu = $db->prepare("SELECT * FROM mesajlar WHERE id=?");
    $updateSorgu->execute([$updateme]);
    $mesajlar = $updateSorgu->fetch(pdo::FETCH_ASSOC);

    if ($mesajlar) {
        echo json_encode($mesajlar);
    } else {
        echo 0;
    }
}
