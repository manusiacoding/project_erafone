<?php
    include '../../../connection.php';
    $id = $_POST['id'];
    $toko = $_POST['toko'];

    $sql = "UPDATE cust_order SET status='BOOKED : $toko', payment_status='PROBING' WHERE id_customer='$id'";
    if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>