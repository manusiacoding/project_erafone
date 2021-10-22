<?php
    $conn = mysqli_connect("localhost","root","","dberafone");
 
    // Check connection
    if (mysqli_connect_errno()){
        echo "Database connection failed! : " . mysqli_connect_error();
    }
?>