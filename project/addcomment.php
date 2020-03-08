<?php
    session_start();
    $link = mysqli_connect( 
        'localhost',  // MySQL主機名稱 
        'roger',       // 使用者名稱 
        'aZxcv7904',  // 密碼
        'phpproject');  // 預設使用的資料庫名稱
        $account=$_COOKIE["admin"];
        $askname=$_POST["name"];        
        $asktitle=$_POST["asktitle"];
        $askcontent=$_POST["askcontent"];
        date_default_timezone_set("Asia/Taipei");
        $date=date("Y/m/d h:i:s");
        $SQLCreate="INSERT into ask VALUES('$account','$askname','$asktitle','$askcontent','$date')";
        $insertresult = mysqli_query($link, $SQLCreate); 



?>