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
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                    <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-bottom">
                            <div class="row">
                                <?php
                                $haberler = $db->query("SELECT * from haberler Where haber_turu = 'spor' Order by id DESC")->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($haberler as $haber) {
                                ?>
                                    <div class="col-lg-4" id="haber_ac" data-id="<?= $haber["id"] ?>">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="resimler/<?= $haber["resim"] ?>" alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1"><?= $haber["baslik"] ?></span>
                                                <!-- Href'e koyacağın şey networkte yazan şey!!! -->
                                                <h4><a href="?page=habersayfa&haber_ac=<?= $haber["id"]?>" id="haber_ac" data-id="<?= $haber["id"] ?>"><?= $haber["ozet"] ?></a></h4>
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
</main>


