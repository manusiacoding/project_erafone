<?php
session_start();
include "../../connection.php";

$kota=$_SESSION['kota'];
// fetch records
$sql = "SELECT * FROM `cust_order` WHERE `kota` LIKE '%$kota%'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
);

echo json_encode($dataset);
?>