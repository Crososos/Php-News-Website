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
                            <h4>İsim ve Logo Ayarları</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item" aria-current="page">Site Ayarları</li>
                                <li class="breadcrumb-item active" aria-current="page">İsim ve Logo Ayarları</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="container">
                    <div class="row">
                    </div>
                    <form method="post" id="logoayar" name="logoayar" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    $isimayar =  $db->query("SELECT `site_isim` as cnt FROM `logoayar` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
                                    $isimayar = $isimayar['cnt'];
                                    ?>
                                    <label for="exampleFormControlInput1">Site Adı</label>
                                    <input type="text" class="form-control" name="isim" id="isim" value="<?= $isimayar ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Üst Logosu</label>
                                    <input type="file" class="form-control-file" name="ust_logo" id="ust_logo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Site Logosu</label>
                                    <input type="file" class="form-control-file" name="site_logo" id="site_logo">
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
                                    <button type="submit" class="btn btn-primary" name="kaydet" id="kaydet">Değişikliği Kaydet</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {


                $("#logoayar").on("submit", function(e) {
                    e.preventDefault();
                    $.ajax({

                        url: "backend/logoayarkayit.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                    });

                });


            });
        </script>