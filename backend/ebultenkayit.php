<?php

include('ayarlar.php');

$mail = $_POST["mail"];

$ebulten = $db->prepare("INSERT INTO e_bulten(mail) Values (?)");
$ebultenekle = $ebulten->execute(array($mail));
