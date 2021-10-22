<?php
    include "../../connection.php"; // Load file connection.php
    $id = $_POST['idcust']; // Retrieve id data sent via AJAX
    $query = mysqli_query($conn, "SELECT * FROM cust_order WHERE id_customer='".$id."'"); // Show student data with the id
    $row = mysqli_num_rows($query); // Calculate how much data from the $query execution results
    if($row > 0){ // If the data is more than 0
      $data = mysqli_fetch_array($query); // take the student's data
      
      $callback = array(
        'status' => 'success', // Set array status with success
        'nama' => $data['nama'],
        'notelp' => $data['no_telp'],
        'alamat' => $data['alamat'],
        'kecamatan' => $data['kecamatan'],
        'kota' => $data['kota'],
        'type' => $data['type_produk'],
        'kota' => $data['kota'],
        'warna' => $data['warna'],
        'opsi' => $data['opsi'],
        'status' => $data['status'],
      );
    }else{
      $callback = array('status' => 'failed'); // set the status array with failed
    }
    echo json_encode($callback); // converting varibel $callback to JSON
?>