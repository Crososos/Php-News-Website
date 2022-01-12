<?php
include("backend/ayarlar.php");
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).on('click', '#haber_ac', function() {
        var haber_ac = $(this).data("id");
        $.ajax({
            url: "?page=habersayfa",
            method: "post",
            dataType: "json",
            data: {
                'haber_ac': haber_ac
            },
            success: function(data) {
                var data1 = data.trim();
                if (data1 == "1") {
                    $('#haber_ac').val(data.haber_ac);
                    header("location:'?page=habersayfa'");
                }
            }
        })
    })
</script>
<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Silince kötü gözüküyor bu yüzden hidden ekledim -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong hidden>Uğur Palak</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- En son Haberi Ekledim -->
                        <div class="trending-top mb-30">
                            <?php
                            $sonhaber = $db->query("SELECT * from haberler Order by id DESC limit 1")->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($sonhaber as $sonhab) {
                            ?>
                                <div class="trend-top-img">
                                    <img src="resimler/<?= $sonhab["resim"] ?>" alt="">
                                    <div class="trend-top-cap">
                                        <span><?= $sonhab["haber_turu"] ?></span>
                                        <h2><a href="?page=habersayfa&haber_ac=<?= $sonhab["id"] ?>" id="haber_ac" data-id="<?= $sonhab["id"] ?>"><?= $sonhab["baslik"] ?></a></h2>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- Üç farklı bölümden son haberini ekledim -->
                        <div class="trending-bottom">
                            <div class="row">
                                <div class="col-lg-4">
                                    <?php
                                    $siyasethaber = $db->query("SELECT * from haberler where haber_turu = 'siyaset' Order by id DESC limit 1")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($siyasethaber as $siyasethab) {
                                    ?>
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="resimler/<?= $siyasethab["resim"] ?>" alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1"><?= $siyasethab["haber_turu"] ?></span>
                                                <h4><a href="?page=habersayfa&haber_ac=<?= $siyasethab["id"] ?>" id="haber_ac" data-id="<?= $siyasethab["id"] ?>"><?= $siyasethab["baslik"] ?></a></h4>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php
                                    $sporhaber = $db->query("SELECT * from haberler where haber_turu = 'spor' Order by id DESC limit 1")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($sporhaber as $sporhab) {
                                    ?>
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="resimler/<?= $sporhab["resim"] ?>" alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1"><?= $sporhab["haber_turu"] ?></span>
                                                <h4><a href="?page=habersayfa&haber_ac=<?= $sporhab["id"] ?>" id="haber_ac" data-id="<?= $sporhab["id"] ?>"><?= $sporhab["baslik"] ?></a></h4>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php
                                    $hayathaber = $db->query("SELECT * from haberler where haber_turu = 'hayat' Order by id DESC limit 1")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($hayathaber as $hayathab) {
                                    ?>
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="resimler/<?= $hayathab["resim"] ?>" alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1"><?= $hayathab["haber_turu"] ?></span>
                                                <h4><a href="?page=habersayfa&haber_ac=<?= $hayathab["id"] ?>" id="haber_ac" data-id="<?= $hayathab["id"] ?>"><?= $hayathab["baslik"] ?></a></h4>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- En yeni olan 5 haber diye yaptım -->
                    <div class="col-lg-4">
                        <?php
                        $yantaraflar = $db->query("SELECT * from haberler Order by id DESC limit 5")->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($yantaraflar as $yantaraf) {
                        ?>
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img style="width: 200px; height:120px " src="resimler/<?= $yantaraf["resim"] ?>" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1"><?= $yantaraf["haber_turu"] ?></span>
                                    <h4><a href="?page=habersayfa&haber_ac=<?= $yantaraf["id"] ?>" id="haber_ac" data-id="<?= $yantaraf["id"] ?>"><?= $yantaraf["baslik"] ?></a></h4>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->

    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <!-- Habeler slider kısmı -->
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>En Güncel Haberler</h3>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="properties__button">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Siyaset</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Teknoloji</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Spor</a>
                                        <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Hayat</a>
                                        <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Eğitim</a>
                                        <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Ekonomi</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content" id="nav-tabContent">
                                <!-- siyaset -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <?php
                                            $siyasetler = $db->query("SELECT * from haberler Where haber_turu = 'siyaset' Order by id DESC limit 4")->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($siyasetler as $siyaset) {
                                            ?>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="resimler/<?= $siyaset["resim"] ?>" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1"><?= $siyaset["haber_turu"] ?></span>
                                                            <h4><a href="?page=habersayfa&haber_ac=<?= $siyaset["id"] ?>" id="haber_ac" data-id="<?= $siyaset["id"] ?>"><?= $siyaset["baslik"] ?></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- teknoloji -->
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <?php
                                            $teknolojiler = $db->query("SELECT * from haberler Where haber_turu = 'teknoloji' Order by id DESC limit 4")->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($teknolojiler as $teknoloji) {
                                            ?>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="resimler/<?= $teknoloji["resim"] ?>" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1"><?= $teknoloji["haber_turu"] ?></span>
                                                            <h4><a href="?page=habersayfa&haber_ac=<?= $teknoloji["id"] ?>" id="haber_ac" data-id="<?= $teknoloji["id"] ?>"><?= $teknoloji["baslik"] ?></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Spor -->
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <?php
                                            $sporlar = $db->query("SELECT * from haberler Where haber_turu = 'spor' Order by id DESC limit 4")->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($sporlar as $spor) {
                                            ?>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="resimler/<?= $spor["resim"] ?>" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1"><?= $spor["haber_turu"] ?></span>
                                                            <h4><a href="?page=habersayfa&haber_ac=<?= $spor["id"] ?>" id="haber_ac" data-id="<?= $spor["id"] ?>"><?= $spor["baslik"] ?></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hayat -->
                                <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <?php
                                            $hayatlar = $db->query("SELECT * from haberler Where haber_turu = 'hayat' Order by id DESC limit 4")->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($hayatlar as $hayat) {
                                            ?>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="resimler/<?= $hayat["resim"] ?>" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1"><?= $hayat["haber_turu"] ?></span>
                                                            <h4><a href="?page=habersayfa&haber_ac=<?= $hayat["id"] ?>" id="haber_ac" data-id="<?= $hayat["id"] ?>"><?= $hayat["baslik"] ?></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Eğitim -->
                                <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <?php
                                            $egitimler = $db->query("SELECT * from haberler Where haber_turu = 'eğitim' Order by id DESC limit 4")->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($egitimler as $egitim) {
                                            ?>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="resimler/<?= $egitim["resim"] ?>" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1"><?= $egitim["haber_turu"] ?></span>
                                                            <h4><a href="?page=habersayfa&haber_ac=<?= $egitim["id"] ?>" id="haber_ac" data-id="<?= $egitim["id"] ?>"><?= $egitim["baslik"] ?></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Ekonomi -->
                                <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-technology">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <?php
                                            $ekonomiler = $db->query("SELECT * from haberler Where haber_turu = 'ekonomi' Order by id DESC limit 4")->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($ekonomiler as $ekonomi) {
                                            ?>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="resimler/<?= $ekonomi["resim"] ?>" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1"><?= $ekonomi["haber_turu"] ?></span>
                                                            <h4><a href="?page=habersayfa&haber_ac=<?= $ekonomi["id"] ?>" id="haber_ac" data-id="<?= $ekonomi["id"] ?>"><?= $ekonomi["baslik"] ?></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sosyal Medya Yönetimi -->
                <div class="col-lg-4">
                    <div class="section-tittle mb-40">
                        <h3>Bizi Takip Edin</h3>
                    </div>
                    <div class="single-follow mb-45">
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
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="<?= $facebook ?>"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                </div>
                                <!-- Buraya Deneme yapmayı planlıyorum -->
                                <div class="follow-count">
                                    <span>Facebook</span>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="<?= $twitter ?>"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>Twitter</span>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="<?= $instagram ?>"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>İnstagram</span>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="<?= $youtube ?>"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>Youtube</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Backendi hazır değil  -->
                    <div class="news-poster d-none d-lg-block">
                        <img src="resimler/hakkimizda.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--   Öne Çıkan Haberler Slider kısmı -->
    <div class="weekly2-news-area  weekly2-pading gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Öne Çıkan Haberler</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly2-news-active dot-style d-flex dot-style">
                            <?php
                            $haberler = $db->query("SELECT * from haberler Order by id DESC limit 20")->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($haberler as $haber) {
                            ?>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="resimler/<?= $haber["resim"] ?>" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1"><?= $haber["haber_turu"] ?></span>
                                        <p><?= $haber["tarih"] ?></p>
                                        <h4><a href="?page=habersayfa&haber_ac=<?= $haber["id"] ?>" id="haber_ac" data-id="<?= $haber["id"] ?>"><?= $haber["baslik"] ?></a></h4>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>