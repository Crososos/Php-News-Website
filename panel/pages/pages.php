<?php

$page = $_GET["page"];

switch ($page) {
    case '':
        include("anasayfa.php");
        break;
    case 'anasayfa':
        include("anasayfa.php");
        break;
    case 'haberler':
        include("haberler.php");
        break;
    case 'haberkayit':
        include("haberkayit.php");
        break;
    case 'yorumlar':
        include("yorumlar.php");
        break;
    case 'mesajlar':
        include("mesajlar.php");
        break;
    case 'uyeler':
        include("uyeler.php");
        break;
    case 'iletisimayar':
        include("iletisimayar.php");
        break;
    case 'reklamayar':
        include("reklamayar.php");
        break;
    case 'sidebarayar':
        include("sidebarayar.php");
        break;
    case 'hakkimizdaayar':
        include("hakkimizdaayar.php");
        break;
    case 'sosyalmedya':
        include("sosyalmedya.php");
        break;
    case 'logoayar':
        include("logoayar.php");
        break;
        echo "Aradığınız sayfayı bulamadım :)";
        break;
}
