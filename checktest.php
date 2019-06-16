<?php
$link = mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'roger',       // 使用者名稱 
    'aZxcv7904',  // 密碼
    'phpproject');  // 預設使用的資料庫名稱
    session_start();
    $account=$_POST["account"];
    $password=$_POST["password"];
    $sql="SELECT * FROM sign";
    if ( $result = mysqli_query($link, $sql) ) {
        while( $row = mysqli_fetch_assoc($result) ){ 
            if($account==$row[signaccount] && $password==$row[signpassword]){
                $flag=1;
            }
    }
} 
if ($account=='admin' && $password==654321) {
    $_SESSION["admin"] = 1;
    date_default_timezone_set("Asia/Taipei");
    $date=strtotime("+1 days",time());
    setcookie("admin",$account,$date);
    header("Location:admin.php");
}
elseif ($flag) {
    $_SESSION["user"] = 2;
    date_default_timezone_set("Asia/Taipei");
    $date=strtotime("+1 days",time());
    setcookie("user",$account,$date);
    echo "<script>alert('使用者登入成功'); location.href = 'library.php';</script>";
}   
else{        
    echo "<script>alert('帳號密碼錯誤，請先註冊'); location.href = 'sign.php';</script>";
}
?>