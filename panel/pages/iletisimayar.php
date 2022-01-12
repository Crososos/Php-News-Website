<?php
include("backend/ayarlar.php");
?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>İletişim Ayarları</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item" aria-current="page">Site Ayarları</li>
                                <li class="breadcrumb-item active" aria-current="page">İletişim Ayarları</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="container">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                $adresbilgisi =  $db->query("SELECT `adres` as cnt FROM `iletisim` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
                                $adresbilgisi = $adresbilgisi['cnt'];
                                ?>
                                <label for="exampleFormControlInput1">Adres</label>
                                <input type="text" class="form-control" id="adres" value="<?= $adresbilgisi ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                $telefonnumarasi =  $db->query("SELECT `tel_no` as cnt FROM `iletisim` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
                                $telefonnumarasi = $telefonnumarasi['cnt'];
                                ?>
                                <label for="exampleFormControlInput1">Telefon Numarası</label>
                                <input type="text" class="form-control" id="tel_no" value="<?= $telefonnumarasi ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                $e_posta =  $db->query("SELECT `e_posta` as cnt FROM `iletisim` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
                                $e_posta = $e_posta['cnt'];
                                ?>
                                <label for="exampleFormControlInput1">E-Posta Adresı</label>
                                <input type="text" class="form-control" id="e_posta" value="<?= $e_posta ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="kaydet">Degisikligi Kaydet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $('#kaydet').click(function() {
                var adres = $('#adres').val();
                var tel_no = $('#tel_no').val();
                var e_posta = $('#e_posta').val();
                $.post('backend/iletisimkayit.php', {
                    'adres': adres,
                    'tel_no': tel_no,
                    'e_posta': e_posta,
                }, function(data) {
                    if (data) {
                        location.reload();
                    }
                });
            })
        </script>