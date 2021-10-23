<?php
// $date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
// echo $date->format('H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <body onload=display_ct();>
    <span id='ct' ></span>
</body>
</html>

<script>
    function display_c(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct()',refresh);
    }
    function display_ct() {
        var x = new Date()
        var hour=x.getHours();
        var minute=x.getMinutes();
        var second=x.getSeconds();
        if(hour <10 ){hour='0'+hour;}
        if(minute <10 ) {minute='0' + minute; }
        if(second<10){second='0' + second;}
        var x3 = hour+':'+minute+':'+second
        document.getElementById('ct').innerHTML = x3;
        display_c();
    }
</script>