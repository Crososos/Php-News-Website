<?php
include("backend/ayarlar.php");
?>
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Bize Ulaşın</h2>
            </div>
            <div class="col-lg-8">
                <form method="post" id="form1" name="form1" enctype="multipart/form-data" class="form-contact contact_form">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control" name="mesaj" id="mesaj" cols="30" rows="9" placeholder=" Enter Message"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="isim" id="isim" type="text" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="mail" id="mail" type="text" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="konu" id="konu" type="text" placeholder="Enter Subject">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn" name="gonder" id="gonder">Gönder</button>
                        <!-- <button type="button" class="button button-contactForm boxed-btn" id="gonder">Gonder</button> -->
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <?php
                    $adresbilgisi =  $db->query("SELECT `adres` as cnt FROM `iletisim` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
                    $adresbilgisi = $adresbilgisi['cnt'];
                    ?>
                    <div class="media-body">
                        <h3><?= $adresbilgisi ?></h3>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <?php
                    $telefonnumarasi =  $db->query("SELECT `tel_no` as cnt FROM `iletisim` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
                    $telefonnumarasi = $telefonnumarasi['cnt'];
                    ?>
                    <div class="media-body">
                        <h3><?= $telefonnumarasi ?></h3>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <?php
                    $e_posta =  $db->query("SELECT `e_posta` as cnt FROM `iletisim` WHERE id = '1' ")->fetch(PDO::FETCH_ASSOC);
                    $e_posta = $e_posta['cnt'];
                    ?>
                    <div class="media-body">
                        <h3><?= $e_posta ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {


        $("#form1").on("submit", function(e) {
            e.preventDefault();
            $.ajax({

                url: "backend/mesajgonder.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
            });
        });
    });




    // $('#gonder').click(function() {
    //     var mesaj = $("#mesaj").val().trim();
    //     var konu = $("#konu").val().trim();
    //     var isim = $("#isim").val().trim();
    //     var mail = $("#mail").val().trim();

    //     $.ajax({
    //         url: "backend/mesajgonder.php",
    //         method: "POST",
    //         dataType: "JSON",
    //         data: {
    //             'isim': isim,
    //             'mesaj': mesaj,
    //             'konu': konu,
    //             'mail': mail,
    //         },
    //         success: function(data) { //Bu alan, başarı durumunda yeni bir tetikleme yaratmak için kullanılabilir
    //             // location.reload();
    //         }
    //     });
    // })
</script>