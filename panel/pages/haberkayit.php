<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Haber Oluştur</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Yeni Haber Oluştur</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="container">
                    <div class="row">
                    </div>
                    <form method="post" id="form1" name="form1" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Haber Başlığı</label>
                                    <input type="text" class="form-control" name="baslik" id="baslik" placeholder="Haber Basligi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Haber Kaynağı</label>
                                    <input type="text" class="form-control" name="kaynak" id="kaynak" placeholder="Haber Kaynagi">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Haber Yazarı</label>
                                    <input type="text" class="form-control" name="yazar" id="yazar" placeholder="Haber Yazari">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Haber Görseli</label>
                                    <input type="file" name="resim" class="form-control-file" id="resim">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Haber Türü</label>
                                <select class="form-control" name="haber_turu" id="haber_turu">
                                    <option selected></option>
                                    <option value="1">Spor</option>
                                    <option value="2">Siyaset</option>
                                    <option value="3">Teknoloji</option>
                                    <option value="4">Ekonomi</option>
                                    <option value="5">Eğitim</option>
                                    <option value="6">Hayat</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Haber Kısa Özeti</label>
                                    <textarea class="form-control" name="ozet" id="ozet" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Haber İçeriği</label>
                                    <textarea class="form-control" name="icerik" id="icerik" rows="3"></textarea>
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
                                    <button type="submit" class="btn btn-primary" name="kaydet" id="kaydet">Kaydet</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <!-- ck editor bi tik sorunlara yol acti -->
        <!-- <script src="ckeditor/ckeditor.js"></script>  -->
        <script>
            $(document).ready(function() {


                $("#form1").on("submit", function(e) {
                    e.preventDefault();
                    $.ajax({

                        url: "backend/haberkayit.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                    });
                });
            });





            // $('#kaydet').click(function() {
            //     var baslik = $('#baslik').val();
            //     var kaynak = $('#kaynak').val();
            //     var yazar = $('#yazar').val();
            //     var haber_turu = $('#haber_turu').val();
            //     var icerik = $('#icerik').val();
            //     // var resim = $('#resim');
            //     $.post('backend/haberkayit.php', {
            //         'baslik': baslik,
            //         'kaynak': kaynak,
            //         'yazar': yazar,
            //         'haber_turu': haber_turu,
            //         // 'resim': resim,
            //         'icerik': icerik

            //     }, function(data) {
            //         if (data) {
            //             location.reload();
            //         }
            //     });
            // })
        </script>