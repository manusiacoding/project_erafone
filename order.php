<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order - Erajaya</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
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
                                <label for="kelurahan">Kelurahan</label>
                                <input type="text" name="kelurahan" class="form-control" id="kelurahan">
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" id="kecamatan">
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" name="kota" class="form-control" id="kota">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- <script src="js/scripts.js"></script> -->
</body>
</html>