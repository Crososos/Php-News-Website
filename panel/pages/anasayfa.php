<?php
include("backend/ayarlar.php");
?>
<?php
$sth = $db->prepare("SELECT * FROM haberler GROUP BY id");
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="main-container">
	<div class="xs-pd-20-10 pd-ltr-20">
		<div class="page-header">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="title">
						<h4>Kullanıcı Paneli</h4>
					</div>
					<nav aria-label="breadcrumb" role="navigation">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="?page=anasayfa">Anasayfa</a></li>
							<li class="breadcrumb-item active" aria-current="page">Kullanıcı Paneli</li>
						</ol>
					</nav>
				</div>
				<div class="col-md-6 col-sm-12 text-right">
					<div>
						<a class="btn btn-primary" href="#">
							<?php
							date_default_timezone_set('Europe/Istanbul');
							echo date("Y/m/d") . " " . date("h:i:sa"); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row pb-10">
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<div class="widget-data">
							<?php
							$habersayisi =  $db->query("SELECT COUNT(id) as cnt FROM haberler")->fetch(PDO::FETCH_ASSOC);
							$habersayisi = $habersayisi['cnt'];
							?>
							<div class="weight-700 font-24 text-dark"><?= $habersayisi ?></div>
							<div class="font-14 text-secondary weight-500">Haber Sayısı</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-calendar1"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<?php
						$mesajsayisi =  $db->query("SELECT COUNT(id) as cnt FROM mesajlar")->fetch(PDO::FETCH_ASSOC);
						$mesajsayisi = $mesajsayisi['cnt'];
						?>
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?= $mesajsayisi ?></div>
							<div class="font-14 text-secondary weight-500">Toplam Mesaj</div>
						</div>
						<div class="widget-icon">
							<div class="icon"><i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<?php
						$yorumsayisi =  $db->query("SELECT COUNT(id) as cnt FROM yorumlar")->fetch(PDO::FETCH_ASSOC);
						$yorumsayisi = $yorumsayisi['cnt'];
						?>
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?= $yorumsayisi ?></div>
							<div class="font-14 text-secondary weight-500">Toplam Yorumlar</div>
						</div>
						<div class="widget-icon">
							<div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-money" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<div class="card-box height-100-p widget-style3">
					<div class="d-flex flex-wrap">
						<?php
						$uyesayisi =  $db->query("SELECT COUNT(id) as cnt FROM e_bulten")->fetch(PDO::FETCH_ASSOC);
						$uyesayisi = $uyesayisi['cnt'];
						?>
						<div class="widget-data">
							<div class="weight-700 font-24 text-dark"><?= $uyesayisi ?></div>
							<div class="font-14 text-secondary weight-500">E-Bülten Aboneleri</div>
						</div>
						<div class="widget-icon">
							<div class="icon"><i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
				<div class="card-box pd-30 pt-10 height-100-p">
					<h2 class="mb-30 h4">Haber Kategorileri</h2>
					<div class="browser-visits">
						<ul>
							<?php
							$spor =  $db->query("SELECT COUNT(id) as cnt FROM haberler where haber_turu='spor'")->fetch(PDO::FETCH_ASSOC);
							$spor = $spor['cnt'];
							?>
							<li class="d-flex flex-wrap align-items-center">
								<div class="icon"><img src="vendors/images/chrome.png" alt=""></div>
								<div class="browser-name">Spor</div>
								<div class="visit"><span class="badge badge-pill badge-primary"><?= $spor ?></span></div>
							</li>
							<?php
							$siyaset =  $db->query("SELECT COUNT(id) as cnt FROM haberler where haber_turu='siyaset'")->fetch(PDO::FETCH_ASSOC);
							$siyaset = $siyaset['cnt'];
							?>
							<li class="d-flex flex-wrap align-items-center">
								<div class="icon"><img src="vendors/images/firefox.png" alt=""></div>
								<div class="browser-name">Siyaset</div>
								<div class="visit"><span class="badge badge-pill badge-secondary"><?= $siyaset ?></span></div>
							</li>
							<?php
							$teknoloji =  $db->query("SELECT COUNT(id) as cnt FROM haberler where haber_turu='teknoloji'")->fetch(PDO::FETCH_ASSOC);
							$teknoloji = $teknoloji['cnt'];
							?>
							<li class="d-flex flex-wrap align-items-center">
								<div class="icon"><img src="vendors/images/safari.png" alt=""></div>
								<div class="browser-name">Teknoloji</div>
								<div class="visit"><span class="badge badge-pill badge-success"><?= $teknoloji ?></span></div>
							</li>
							<?php
							$ekonomi =  $db->query("SELECT COUNT(id) as cnt FROM haberler where haber_turu='ekonomi'")->fetch(PDO::FETCH_ASSOC);
							$ekonomi = $ekonomi['cnt'];
							?>
							<li class="d-flex flex-wrap align-items-center">
								<div class="icon"><img src="vendors/images/edge.png" alt=""></div>
								<div class="browser-name">Ekonomi</div>
								<div class="visit"><span class="badge badge-pill badge-warning"><?= $ekonomi ?></span></div>
							</li>
							<?php
							$egitim =  $db->query("SELECT COUNT(id) as cnt FROM haberler where haber_turu='eğitim'")->fetch(PDO::FETCH_ASSOC);
							$egitim = $egitim['cnt'];
							?>
							<li class="d-flex flex-wrap align-items-center">
								<div class="icon"><img src="vendors/images/opera.png" alt=""></div>
								<div class="browser-name">Eğitim</div>
								<div class="visit"><span class="badge badge-pill badge-info"><?= $egitim ?></span></div>
							</li>
							<?php
							$hayat =  $db->query("SELECT COUNT(id) as cnt FROM haberler where haber_turu='hayat'")->fetch(PDO::FETCH_ASSOC);
							$hayat = $hayat['cnt'];
							?>
							<li class="d-flex flex-wrap align-items-center">
								<div class="icon"><img src="vendors/images/opera.png" alt=""></div>
								<div class="browser-name">Hayat</div>
								<div class="visit"><span class="badge badge-pill badge-info"><?= $hayat ?></span></div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
				<div class="card-box pd-30 pt-10 height-100-p">
					<h2 class="mb-30 h4">Dünya Haritası</h2>
					<div id="browservisit" style="width:100%!important; height:380px"></div>
				</div>
			</div>
		</div>