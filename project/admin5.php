<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>外借書目</title>
</head>
<body>
<link rel="stylesheet" href="admin1.css">
<div class="wrap">
    <div class="title">
  
    <h2 class="analysis"><a href="analysis.php">後台分析</a></h2>
      <img src="1.jpg" width="87px" length="87px" alt=""><a href="#"></a>
      <h1><a href="admin.php" >Keeper</a></h1>
        </div>
        <div class="hello">
        <h2>管理者您好</h2>
        </div>
        <div class="logout">
        <h2><a href="logout.php" rel="noopener noreferrer">登出</a></h2>
        </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="clear"></div>
</div>
    
</body>
</html>
<?php
//更新 
    session_start();
    if(!isset($_COOKIE["admin"])){
        echo "<script>alert('請先登入'); location.href = 'library.php';</script>";
    }
    $link = mysqli_connect( 
        'db',  // MySQL主機名稱 
        'roger',       // 使用者名稱 
        'aZxcv7904',  // 密碼
        'phpproject');  // 預設使用的資料庫名稱
   
    $sql="select * from bulletin";
    echo "<table width=50%  border=3 class='tableeee' bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
    echo "<tr bgcolor='#f5f290'>"."<td>"."時間"."</td><td>"."布告欄內容"."</td><td>"."修改資料"."</td>"."</tr>";
    if ( $result = mysqli_query($link, $sql) ) {
        while( $row = mysqli_fetch_assoc($result) ){ 
            echo "<tr>"."<td>".$row["time"]."</td><td>".$row["li"]."</td><td>"."<a href='alterbulletin.php?li=".$row['li']."'>修改資料</a>"."</td>"."</tr>";
            
        }
}
$sql="select * from activity";
echo "<table width=50%  border=3 class='tableeee' bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
echo "<tr bgcolor='#f5f290'>"."<td>"."時間"."</td><td>"."活動內容"."</td><td>"."修改資料"."</td>"."</tr>";
if ( $result = mysqli_query($link, $sql) ) {
    while( $row = mysqli_fetch_assoc($result) ){ 
        echo "<tr>"."<td>".$row["time"]."</td><td>".$row["li"]."</td><td>"."<a href='alteractivity.php?li=".$row['li']."'>修改資料</a>"."</td>"."</tr>";
        
    }
}
?>
