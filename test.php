<?php
$date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
echo $date->format('H:i:s');
?>