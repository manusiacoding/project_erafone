<?php
    include "../../connection.php";
    $idcust = $_GET['id_customer'];
    $query = mysqli_query($conn, "SELECT * FROM cust_order WHERE id_customer='$idcust'");

    $data = mysqli_fetch_array($query);
    $customer = array(
                'nama'      =>  $data['nama'],
              );
    echo json_encode($customer);
?>
