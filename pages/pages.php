<?php

// verilen hata line4 ile alakalı nedinini anlamadım panel de aynı hatayı vermiyor
error_reporting(0);

$page = $_GET["page"];

switch ($page) {
	case '':
		include("anasayfa.php");
		break;
	case 'anasayfa':
		include("anasayfa.php");
		break;
	case 'iletisim':
		include("iletisim.php");
		break;
	case 'hakkimizda':
		include("hakkimizda.php");
		break;
	case 'spor':
		include("spor.php");
		break;
	case 'siyaset':
		include("siyaset.php");
		break;
	case 'teknoloji':
		include("teknoloji.php");
		break;
	case 'hayat':
		include("hayat.php");
		break;
	case 'egitim':
		include("egitim.php");
		break;
	case 'ekonomi':
		include("ekonomi.php");
		break;
	case 'habersayfa':
		include("habersayfa.php");
		break;
		echo "Aradığınız sayfayı bulamadım :)";
		break;
}
