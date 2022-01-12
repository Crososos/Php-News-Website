<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>E-Posta Gonder</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">E-Posta Gönder</li>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Konu</label>
                                <input type="text" class="form-control" id="konu" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Haber İçeriği</label>
                                <textarea class="ckeditor" name="sip_detay" id="icerik"></textarea>
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
                                <button type="button" class="btn btn-primary" id="gonder">Gönder</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="ckeditor/ckeditor.js"></script> 
        <script>
            $('#gonder').click(function() {
                var konu = $('#konu').val();
                var icerik = CKEDITOR.instances['icerik'].getData()
                $.post('backend/mailgonder.php', {
                    'konu': konu,
                    'icerik': icerik
                }, function(data) {
                    if (data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Kayıt Başarılı Yönlendiriliyor',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    }
                });
            })
        </script>