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
	$kelurahan = $_POST['kelurahan'];
	$kecamatan = $_POST['kecamatan'];
	$kota = $_POST['kota'];
	$type = $_POST['type'];
	$warna = $_POST['warna'];
	$opsi = $_POST['ops'];

	$sql = "INSERT INTO `cust_order` (`id_customer`, `nama`, `no_telp`, `alamat`, `kelurahan`, `kecamatan`, `kota`, `type_produk`, `warna`, `ops_pembayaran`, `status`, `payment_status`, `transaction_status`) VALUES (NULL, '$nama', '$notelp', '$alamat', '$kelurahan', '$kecamatan', '$kota', '$type', '$warna', '$opsi', 'Available', '', '');";

	if($conn->query($sql) === false) {
		trigger_error('Perintah SQL Salah: ' . $sql . '<br /> Error: ' . $conn->error, E_USER_ERROR);
	 } else { 
	  	header('location: order.php');
	}
}
////////////////// end order action  //////////////////
?>