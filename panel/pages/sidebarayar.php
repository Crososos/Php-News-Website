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
                            <h4>Menü Yönetimi</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Menü Yönetimi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="container">
                    <div class="row">
                    </div>
                    <?php
                    $basliklar = $db->query("SELECT * from menuyonetim ORDER BY pozisyon")->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($basliklar as $baslik) {
                    ?>
                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group">
                                <input type="text" class="form-control" id="<?= $baslik["id"] ?>" value="<?= $baslik["menu_ismi"] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="siralama">
                                        <option selected><?= $baslik["pozisyon"] ?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="kaydet">Kaydet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        <script>
            $('#kaydet').click(function() {
                var baslik = $('#baslik').val();
                var siralama = $('#siralama').val();
                $.post('backend/sidebarayar.php', {
                    'baslik': baslik,
                    'siralama': siralama,
                }, function(data) {
                    if (data) {
                        // location.reload();
                    }
                });
            })
        </script>