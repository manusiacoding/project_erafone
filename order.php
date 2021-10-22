<?php
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order - Erajaya</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="js/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="js/select2/css/select2.min.css">
</head>
<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card m-3 p-2">
                    <div class="card-header">
                        <h3 class="card-title">Form Pemesanan Customer</h3>
                    </div>
                    <div class="card-body text-left">
                        <form  action="query_action.php" method="POST">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div>
                            <div class="form-group">
                                <label for="notelp">Nomor Telepon</label>
                                <input type="text" name="notelp" class="form-control" id="notelp">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <!-- <input type="textarea" name="alamat" class="form-control" id="alamat"> -->
                                <textarea name="alamat" class="form-control" cols="20" rows="5" id="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                    <?php                    
                                        $sql_provinsi = mysqli_query($conn,"SELECT * FROM provinsi ORDER BY nama ASC");
                                    ?>
                                <select class="form-control" name="provinsi" id="provinsi">
                                        <option></option>
                                        <?php                       
                                            while($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)){ 
                                                echo '<option value="'.$rs_provinsi['id_prov'].'">'.$rs_provinsi['nama'].'</option>';
                                            }                        
                                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <select class="form-control" name="kota" id="kota">
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="kecamatan">
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelurahan">Kelurahan</label>
                                <select class="form-control" name="kelurahan" id="kelurahan">
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Type Produk</label>
                                <input type="text" name="type" class="form-control" id="type">
                            </div>
                            <div class="form-group">
                                <label for="warna">Warna</label>
                                <input type="text" name="warna" class="form-control" id="warna">
                            </div>
                            <div class="form-group">
                                <label for="ops">Opsi Pembayaran</label>
                                <select name="ops" id="ops" class="form-control">
                                    <option selected>Pilih Opsi Pembayaran...</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                    <option value="COD">COD (Cash On Delivery)</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/select2/js/select2.min.js"></script>
    <script src="js/select2/js/i18n/id.js"></script>
    <script>
        $(document).ready(function(){
            $('#provinsi').select2({
                placeholder: 'Pilih Provinsi',
                language: "id"
            });
            $('#kota').select2({
                placeholder: 'Pilih Kota/Kabupaten',
                language: "id"
            });
            $('#kecamatan').select2({
                placeholder: 'Pilih Kecamatan',
                language: "id"
            });
            $('#kelurahan').select2({
                placeholder: 'Pilih Kelurahan',
                language: "id"
            });

            $("#provinsi").change(function(){
                var id_provinces = $('#provinsi').val(); 
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "data-wilayah.php?jenis=kota",
                    data: "id_provinces="+id_provinces,
                    success: function(msg){
                        $("#kota").html(msg);
                        getAjaxKota();                                                        
                    }
                });                    
            });  

            $("#kota").change(getAjaxKota);
            function getAjaxKota(){
                var id_regencies = $("#kota").val();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "data-wilayah.php?jenis=kecamatan",
                    data: "id_regencies="+id_regencies,
                    success: function(msg){
                        $("#kecamatan").html(msg);
                        getAjaxKecamatan();                                                    
                    }
                });
            }

            $("#kecamatan").change(getAjaxKecamatan);
            function getAjaxKecamatan(){
                var id_district = $("#kecamatan").val();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "data-wilayah.php?jenis=kelurahan",
                    data: "id_district="+id_district,
                    success: function(msg){
                        $("#kelurahan").html(msg);                                       
                    }
                });
            }
        });
    </script>
</body>
</html>