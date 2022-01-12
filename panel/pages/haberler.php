<?php
include("backend/ayarlar.php");
?>
<?php
$sth = $db->prepare("SELECT * FROM haberler GROUP BY id DESC");
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Haber Listesi</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Haber Listesi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Haber Listesi</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>Sıra</th>
                                <th>Haber Başlığı</th>
                                <th>Haber Kaynağı</th>
                                <th>Haber Yazarı</th>
                                <th>Haber Türü</th>
                                <th>Kayıt Tarihi</th>
                                <th>Düzenleme</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rows as $key => $row) {
                                $key++;
                            ?>
                                <tr>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo $row["baslik"]; ?></td>
                                    <td><?php echo $row["kaynak"]; ?></td>
                                    <td><?php echo $row["yazar"]; ?></td>
                                    <td><?php echo $row["haber_turu"]; ?></td>
                                    <td><?php echo $row["tarih"]; ?></td>
                                    <td>
                                        <a href="#" class="edit" title="Önizle" data-toggle="tooltip" id="onizle" data-id="<?= $row["id"] ?>"><i class="ti-fullscreen"></i></a>
                                        <a href="#" class="edit" title="Düzenle" data-toggle="tooltip" id="update" data-id="<?= $row["id"] ?>"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="delete" title="Sil" id="sil" data-id="<?= $row["id"] ?>"><i class="ion-ios-close"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal kismi -->
        <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Haber Düzenle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Haber Başlığı</label>
                                    <input type="text" class="form-control" id="baslik" placeholder="Haber Basligi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Haber Kaynağı</label>
                                    <input type="text" class="form-control" id="kaynak" placeholder="Haber Kaynagi">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Haber Yazarı</label>
                                    <input type="text" class="form-control" id="yazar" placeholder="Haber Yazari">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Haber Görseli</label>
                                    <input type="file" class="form-control-file" id="resim">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Haber Türü</label>
                                <select class="form-control" id="haber_turu">
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
                                    <label for="exampleFormControlTextarea1">Haber İçeriği</label>
                                    <textarea class="form-control" id="icerik" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="duzenleid">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="button" class="btn btn-primary" id="haberkaydet">Değişiklikleri Kaydet
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script src="vendors/scripts/core.js"></script>
        <script src="vendors/scripts/script.min.js"></script>
        <script src="vendors/scripts/process.js"></script>
        <script src="vendors/scripts/layout-settings.js"></script>
        <script src="src/plugins/datatables/js/jquery.dataTables.min.js" defer></script>
        <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
        <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
        <script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables/js/buttons.print.min.js"></script>
        <script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
        <script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
        <script src="src/plugins/datatables/js/pdfmake.min.js"></script>
        <script src="src/plugins/datatables/js/vfs_fonts.js"></script>
        <script src="vendors/scripts/datatable-setting.js"></script>
        </body>


        <script>
            $(document).ready(function() {
                var table = $('#mytable').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: true,
                    columnDefs: [{
                        width: '20%',
                        targets: 0
                    }],
                    fixedColumns: true
                });
            });

            $(document).on('click', '#sil', function() {
                var id = $(this).data("id");
                $.post('backend/habersil.php', {
                    'sil': id
                }, function(data) {
                    if (data == 1) {
                        alert("Silme İşlemi Gerçekleştirildi.");
                        location.reload();
                    } else {
                        alert("Hata Oluştu!");
                    }
                });
            })

            //Modalda
            $(document).on('click', '#update', function() {
                var id = $(this).data("id");
                $.ajax({
                    url: "backend/habermodal.php",
                    method: "post",
                    dataType: "json",
                    data: {
                        'updateme': id
                    },
                    success: function(data) {
                        $('#exampleModal').modal('show').addClass('show');
                        $('#baslik').val(data.baslik);
                        $('#kaynak').val(data.kaynak);
                        $('#yazar').val(data.yazar);
                        $('#haber_turu').val(data.haber_turu);
                        $('#icerik').val(data.icerik);
                        $('#duzenleid').val(data.id);
                    }
                })
            })

            //değişiklikler için 
            $('#haberkaydet').click(function() {
                var adi = $('#ad_soyad').val();
                var tel_no = $('#tel_no').val();
                var e_posta = $('#e_posta').val();
                var kullanici_rol = $('#kullanici_rol').val();
                var id = $('#duzenleid').val();
                $.post('backend/haberduzenle.php', {
                    'adi': adi,
                    'tel_no': tel_no,
                    'e_posta': e_posta,
                    'kullanici_rol': kullanici_rol,
                    'id': id
                }, function(data) {
                    location.reload();
                });
            })
        </script>