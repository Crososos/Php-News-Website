<?php
include("backend/ayarlar.php");
?>
<?php
$facebook =  $db->query("SELECT `facebook` as cnt FROM `sosyalmedya` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
$facebook = $facebook['cnt'];

$twitter =  $db->query("SELECT `twitter` as cnt FROM `sosyalmedya` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
$twitter = $twitter['cnt'];

$instagram =  $db->query("SELECT `instagram` as cnt FROM `sosyalmedya` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
$instagram = $instagram['cnt'];

$youtube =  $db->query("SELECT `youtube` as cnt FROM `sosyalmedya` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
$youtube = $youtube['cnt'];
?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Sosyal Medya Ayarları</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item" aria-current="page">Site Ayarları</li>
                                <li class="breadcrumb-item active" aria-current="page">Sosyal Medya Ayarları</li>
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
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="<?= $facebook ?>"><img src="../assets/img/news/icon-fb.png" alt=""></a>
                                    <a href="<?= $twitter ?>"><img src="../assets/img/news/icon-tw.png" alt=""></a>
                                    <a href="<?= $instagram ?>"><img src="../assets/img/news/icon-ins.png" alt=""></a>
                                    <a href="<?= $youtube ?>"><img src="../assets/img/news/icon-yo.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Facebook</label>
                                <input type="text" class="form-control" id="facebook" value="<?= $facebook ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Twitter</label>
                                <input type="text" class="form-control" id="twitter" value="<?= $twitter ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">İnstagram</label>
                                <input type="text" class="form-control" id="instagram" value="<?= $instagram ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Youtube</label>
                                <input type="text" class="form-control" id="youtube" value="<?= $youtube ?>">
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
                var facebook = $('#facebook').val();
                var twitter = $('#twitter').val();
                var instagram = $('#instagram').val();
                var youtube = $('#youtube').val();
                $.post('backend/sosyalmedyakayit.php', {
                    'facebook': facebook,
                    'twitter': twitter,
                    'instagram': instagram,
                    'youtube': youtube,
                }, function(data) {
                    if (data) {
                        location.reload();
                    }
                });
            })
        </script>