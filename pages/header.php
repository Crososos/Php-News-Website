<?php
include("backend/ayarlar.php");
?>
<header>
    <div class="header-area">
        <div class="main-header ">
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Site logosu kısmı -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="?page=anasayfa"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <!-- Üst panel reklam kısmı reklam=1 adı -->
                                <img src="assets/img/hero/header_card.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky neresi bu anlamadım-->
                            <div class="sticky-logo">
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <!-- Sayfalar kısmı -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <?php
                                        $basliklar = $db->query("SELECT * from menuyonetim ORDER BY pozisyon")->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($basliklar as $baslik) {
                                        ?>
                                            <li><a href="<?= $baslik["link"] ?>"><?= $baslik["menu_ismi"] ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                
                            </div>
                        </div>
                        <!-- Telefon için olan kısım -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>