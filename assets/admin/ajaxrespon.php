<?php
    include "../../connection.php";
    $idcust = $_GET['id_customer'];
    $query = mysqli_query($conn, "SELECT * FROM `cust_order` LEFT JOIN `asl` ON `cust_order`.`id_customer` = `asl`.`id_customer` WHERE `cust_order`.`id_customer` = '$idcust'");

    $data = mysqli_fetch_array($query);
    $customer = array(
                'nama'            =>  $data['nama'],
                'notelp'          =>  $data['no_telp'],
                'alamat'          =>  $data['alamat'],
                'kecamatan'       =>  $data['kecamatan'],
                'kota'            =>  $data['kota'],
                'type_produk'     =>  $data['type_produk'],
                'warna'           =>  $data['warna'],
                'ops_pembayaran'  =>  $data['ops_pembayaran'],
                'status'          =>  $data['status'],
                'nama_toko'       =>  $data['nama_toko'],
              );
    echo json_encode($customer);
?>
