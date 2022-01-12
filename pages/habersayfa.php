<?php
include("backend/ayarlar.php");
//Post değil Get
$haber_ac = $_GET["haber_ac"];

if ($haber_ac) {
    $updateSorgu = $db->prepare("SELECT * FROM haberler WHERE id=?");
    $updateSorgu->execute([$haber_ac]);
    $haber = $updateSorgu->fetch(pdo::FETCH_ASSOC);
}

?>
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="resimler/<?= $haber["resim"] ?>" alt="">
                    </div>
                    <div class="blog_details">
                        <h2><?= $haber["baslik"] ?>
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a><i class="fa fa-user"></i><?= $haber["yazar"] ?></a></li>
                            <?php
                            $haberin_id = $haber["id"];
							$yorumsayisi =  $db->query("SELECT COUNT(id) as cnt FROM yorumlar where haber_id = '$haberin_id' ")->fetch(PDO::FETCH_ASSOC);
							$yorumsayisi = $yorumsayisi['cnt'];
							?>
                            <li><a><i class="fa fa-comments"></i> <?= $yorumsayisi ?> Yorumlar</a></li>
                            <li><a><i></i> <?= $haber["tarih"] ?></a></li>
                        </ul>
                        <p class="excert">
                            <?= $haber["icerik"] ?>
                        </p>
                    </div>
                </div>
                <div class="comments-area">
                    <h4>Yorumlar</h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="desc">
                                    <?php
                                    $haberin_id = $haber["id"];
                                    $yorumlar = $db->query("SELECT * from yorumlar Where haber_id = '$haberin_id' and onaylama = '1' Order by id DESC")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($yorumlar as $yorum) {
                                    ?>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <a><?= $yorum["isim"] ?></a>
                                                </h5>
                                            </div>
                                        </div>
                                        <p class="comment">
                                            <?= $yorum["mesaj"] ?>
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <p class="date"><?= $yorum["tarih"] ?> </p>
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
                <div class="comment-form">
                    <h4>Yorum Yapın</h4>
                    <!-- <form class="form-contact comment_form" method="post" id="yorum_form" name="yorum_form" enctype="multipart/form-data"> -->
                    <form class="form-contact comment_form">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="mesaj" id="mesaj" cols="30" rows="9" placeholder="Yorumunuzu Giriniz"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="isim" id="isim" type="text" placeholder="İsim">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="mail" id="mail" type="email" placeholder="E-Posta">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input hidden type="text" class="form-control" name="haber_id" id="haber_id" value="<?= $haber["id"] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input hidden type="text" class="form-control" name="haber_baslik" id="haber_baslik" value="<?= $haber["baslik"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="button button-contactForm btn_1 boxed-btn" id="gonder">Gönder</button>
                            <!-- <button type="submit" class="button button-contactForm btn_1 boxed-btn" name="gonder" id="gonder">Gönder</button> -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- Benzer Haberler Kısmı -->
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Benzer Haberler</h3>
                        <?php
                        $tur = $haber["haber_turu"];
                        //Sıralama örneğine dikkat
                        $benzerler = $db->query("SELECT * from haberler Where haber_turu = '$tur' Order By id DESC limit 5 ")->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($benzerler as $benzer) {
                        ?>
                            <div class="media post_item">
                                <!-- Buraya mecburiyetten css yazdım -->
                                <img src="resimler/<?= $benzer["resim"] ?>" alt="post" style="width: 200px; height:120px ">
                                <div class="media-body">
                                    <a href="?page=habersayfa&haber_ac=<?= $benzer["id"] ?>" id="haber_ac" data-id="<?= $benzer["id"] ?>">
                                        <h3><?= $benzer["baslik"] ?></h3>
                                    </a>
                                    <p><?= $benzer["tarih"] ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </aside>
                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">E-Bülten</h4>
                        <form id="ebulten" name="ebulten" method="post">
                            <div class="form-group">
                                <input type="email" name="mail" id="mail" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit" name="submit" id="submit">Kayıt Olun</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
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

    // Yorum ksımı
    // $(document).ready(function() {
    //     $("#yorum_kısmı").on("submit", function(e) {
    //         e.preventDefault();
    //         $.ajax({

    //             url: "backend/yorumlar.php",
    //             type: "POST",
    //             data: new FormData(this),
    //             contentType: false,
    //             processData: false,

    //         });
    //         return false;
    //     });
    // });


    $('#gonder').click(function() {
        var mesaj = $("#mesaj").val().trim();
        var isim = $("#isim").val().trim();
        var mail = $("#mail").val().trim();
        var haber_id = $("#haber_id").val().trim();
        var haber_baslik = $("#haber_baslik").val().trim();

        $.ajax({
            url: "backend/yorumlar.php",
            method: "POST",
            dataType: "JSON",
            data: {
                'isim': isim,
                'mesaj': mesaj,
                'mail': mail,
                'haber_id': haber_id,
                'haber_baslik': haber_baslik,
            },
            success: function(data) { //Bu alan, başarı durumunda yeni bir tetikleme yaratmak için kullanılabilir
                // location.reload();
            }
        });
    })
</script>
<script>
    $(document).ready(function() {
        $("#ebulten").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "backend/ebultenkayit.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
            });

        });
    });
</script>