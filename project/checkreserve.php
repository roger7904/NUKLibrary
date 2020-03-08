<?php
    session_start();
    $link = mysqli_connect( 
        'localhost',  // MySQL主機名稱 
        'roger',       // 使用者名稱 
        'aZxcv7904',  // 密碼
        'phpproject');  // 預設使用的資料庫名稱
        $password=$_POST["password"];
        $account=$_COOKIE["user"];
        $sql="SELECT signpassword FROM sign where signaccount=$account";
        if ( $result = mysqli_query($link, $sql) ) {
            $row = mysqli_fetch_assoc($result);
            if($row[signpassword]==$password){
                header("Location=reserve.php");
            }
            else{
                echo "<script>alert('密碼錯誤'); location.href = 'search.php';</script>";
            }

        }



?>