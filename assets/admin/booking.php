<?php
    include "../../connection.php";
    $idcust=$_POST['idcust'];
    $toko=$_POST['toko'];

    $sql = "INSERT INTO `asl`( `id_customer`, `nama_toko`) VALUES ('$idcust','$toko')";
    $result = mysqli_query($conn, $sql);
?>