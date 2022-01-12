<?php
include("backend/ayarlar.php");
?>
<main>
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="about-right mb-90">
                        <div class="about-img">
                            <?php
                            $hakkimizdaresim =  $db->query("SELECT `resim` as cnt FROM `hakkimizda` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
                            $hakkimizdaresim = $hakkimizdaresim['cnt'];
                            ?>
                            <img src="resimler/<?= $hakkimizdaresim ?>" alt="">
                        </div>
                        <div class="section-tittle mb-30 pt-30">
                            <?php
                            $hakkimizdabaslik =  $db->query("SELECT `baslik` as cnt FROM `hakkimizda` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
                            $hakkimizdabaslik = $hakkimizdabaslik['cnt'];
                            ?>
                            <h3><?= $hakkimizdabaslik ?></h3>
                        </div>
                        <div class="about-prea">
                            <?php
                            $hakkimizdaaciklama =  $db->query("SELECT `aciklama` as cnt FROM `hakkimizda` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
                            $hakkimizdaaciklama = $hakkimizdaaciklama['cnt'];
                            ?>
                            <p class="about-pera1 mb-25">
                                <?= $hakkimizdaaciklama ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="section-tittle mb-40">
                        <h3>Follow Us</h3>
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
                    <div class="news-poster d-none d-lg-block">
                        <img src="assets/img/news/news_card.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>