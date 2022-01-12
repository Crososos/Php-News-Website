<?php
include("backend/ayarlar.php");
?>
<?php
$sth = $db->prepare("SELECT * FROM mesajlar GROUP BY id");
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
                            <h4>Gelen Mesajlar</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?page=anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gelen Mesajlar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Gelen Mesajlar</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>Sıra</th>
                                <th>İsim</th>
                                <th>E-Posta</th>
                                <th>Konu</th>
                                <th>Tarih</th>
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
                                    <td><?php echo $row["isim"]; ?></td>
                                    <td><?php echo $row["mail"]; ?></td>
                                    <td><?php echo $row["konu"]; ?></td>
                                    <td><?php echo $row["tarih"]; ?></td>
                                    <td>
                                        <a href="#" class="edit" title="Önizle" data-toggle="tooltip" id="onizle" data-id="<?= $row["id"] ?>"><i class="ti-fullscreen"></i></a>
                                        <a href="#" class="edit" title="Cevapla" data-toggle="tooltip" id="cevapla" data-id="<?= $row["id"] ?>"><i class="fa fa-edit"></i></a>
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
        <!-- Onizle Modal kismi -->
        <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mesaji Görüntüle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">İsim</label>
                                    <input type="text" class="form-control" id="isim">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">E-Posta</label>
                                    <input type="text" class="form-control" id="mail">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Konu</label>
                                    <input type="text" class="form-control" id="konu">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tarih</label>
                                    <input type="text" class="form-control" id="tarih">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Mesaj</label>
                                    <textarea class="form-control" id="mesaj" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cevaplama Modalı -->
        <div class="modal fade bs-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mesajı Cevapla</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Kime</label>
                                    <input type="text" class="form-control" id="mail">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Konu</label>
                                    <input type="text" class="form-control" id="konu1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Mesaj İçeriği</label>
                                    <textarea class="form-control" id="mesaj_icerik" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="button" class="btn btn-primary" id="mesajgonder">Mesajı Gönder
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
                $.post('backend/mesajsil.php', {
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

            //Mesaji goruntule
            $(document).on('click', '#onizle', function() {
                var id = $(this).data("id");
                $.ajax({
                    url: "backend/mesajmodal.php",
                    method: "post",
                    dataType: "json",
                    data: {
                        'updateme': id
                    },
                    success: function(data) {
                        $('#exampleModal').modal('show').addClass('show');
                        $('#isim').val(data.isim);
                        $('#mail').val(data.mail);
                        $('#konu').val(data.konu);
                        $('#tarih').val(data.tarih);
                        $('#mesaj').val(data.mesaj);
                    }
                })
            })

            //Mesaji cevapla
            $(document).on('click', '#cevapla', function() {
                var id = $(this).data("id");
                $.ajax({
                    url: "backend/mesajmodal.php",
                    method: "post",
                    dataType: "json",
                    data: {
                        'updateme': id
                    },
                    success: function(data) {
                        $('#exampleModal2').modal('show').addClass('show');
                        $('#mail').val(data.mail);
                    }
                })
            })

            //cevabi kaydet için 
            $('#mesajgonder').click(function() {
                var konu1 = $('#konu1').val();
                var mesaj_icerik = $('#mesaj_icerik').val();
                var mail = $('#mail').val();
                $.post('backend/mesajgonder.php', {
                    'konu1': konu1,
                    'mesaj_icerik': mesaj_icerik,
                    'mail': mail,
                }, function(data) {
                    location.reload();
                });
            })
        </script>