<?php
session_start();
include 'connection.php';

////////////////// login action //////////////////
if (isset($_POST["login"])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$login = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
	$check = mysqli_num_rows($login);

	if($check > 0){
		$data = mysqli_fetch_assoc($login);

		// if users login as admin
		if($data['id_roles']=="1"){
			$_SESSION['username'] = $data['name'];
			$_SESSION['roles'] = "Administrator";
			$_SESSION['kota'] = $data['city'];
			
			// direct to admin dashboard
			header("location:assets/admin/index.php");

		// if users login as sales
		}else if($data['id_roles']=="2"){
			$_SESSION['username'] = $data['name'];
			$_SESSION['roles'] = "Sales";
			$_SESSION['kota'] = $data['city'];

			// direct to sales dashboard
			header("location:assets/sales/index.php");

		// if users login as user
		}else{
			// direct to login page if not found an account
			header("location:login.php?message=failed");
		}	
	}else{
		header("location:login.php?message=failed");
	}
}

////////////////// end login action  //////////////////

////////////////// order action  //////////////////
if (isset($_POST['save'])){
	$nama = $_POST['nama'];
	$notelp = $_POST['notelp'];
	$alamat  = $_POST['alamat'];
	$provinsi = $_POST['provinsi'];
	$kota = $_POST['kota'];
	$kecamatan = $_POST['kecamatan'];
	$kelurahan = $_POST['kelurahan'];
	$kota = $_POST['kota'];
	$type = $_POST['type'];
	$warna = $_POST['warna'];
	$opsi = $_POST['ops'];

	// get name of provinsi, kota, kecamatan, kelurahan //
	$sql_prov = mysqli_query($conn,"SELECT * FROM provinsi WHERE id_prov='$provinsi'");
	$check_prov = mysqli_num_rows($sql_prov);

	if($check_prov > 0){
		$data = mysqli_fetch_assoc($sql_prov);
        $result_prov = $data['nama'];
    }

	$sql_kota = mysqli_query($conn,"SELECT * FROM kabupaten WHERE id_kab='$kota'");
	$check_kota = mysqli_num_rows($sql_kota);

	if($check_kota > 0){
		$data = mysqli_fetch_assoc($sql_kota);
        $result_kota = $data['nama'];
    }

	$sql_kec = mysqli_query($conn,"SELECT * FROM kecamatan WHERE id_kec='$kecamatan'");
	$check_kec = mysqli_num_rows($sql_kec);

	if($check_kec > 0){
		$data = mysqli_fetch_assoc($sql_kec);
        $result_kec = $data['nama'];
    }

	$sql_kel = mysqli_query($conn,"SELECT * FROM kelurahan WHERE id_kel='$kelurahan'");
	$check_kel = mysqli_num_rows($sql_kel);

	if($check_kel > 0){
		$data = mysqli_fetch_assoc($sql_kel);
        $result_kel = $data['nama'];
    }
	/////////////////////////////////////////////////////

	$sql = "INSERT INTO `cust_order` (`id_customer`, `nama`, `no_telp`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `type_produk`, `warna`, `ops_pembayaran`, `status`, `payment_status`, `transaction_status`) VALUES (NULL, '$nama', '$notelp', '$alamat', '$result_prov', '$result_kota', '$result_kec', '$result_kel', '$type', '$warna', '$opsi', 'Available', '', '');";

	if($conn->query($sql) === false) {
		trigger_error('Perintah SQL Salah: ' . $sql . '<br /> Error: ' . $conn->error, E_USER_ERROR);
	 } else { 
	  	header('location: order.php');
	}
}
////////////////// end order action  //////////////////
?>