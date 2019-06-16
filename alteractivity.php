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
    session_start();
    $link = mysqli_connect( 
        'localhost',  // MySQL主機名稱 
        'roger',       // 使用者名稱 
        'aZxcv7904',  // 密碼
        'phpproject');  // 預設使用的資料庫名稱
    $li=$_GET["li"];
    $sql="select * from activity where li='$li'";
    if ( $result = mysqli_query($link, $sql) ) {
            $row = mysqli_fetch_assoc($result);
            echo "<table width=50% class='tableeeeee' bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
            echo "<tr bgcolor='#f5f290'><td>"."修改時間"."</td><td>"."活動內容"."</td><td>"."活動連結"."</td></tr>";
            echo "<tr><td>".$row["time"]."</td><td>".$row["li"]."</td><td>".$row["link"]."</td></tr>";
        }
        echo "<div class=".'tableeeee'.">";
        echo "<form method=".'POST'." class='#'>";
        echo "<h2>輸入要改的活動內容:</h2>"."<input type=".'text'." name=".'alteractivity'."><br/><br/>";
        echo "<h2>輸入要改的活動連結:</h2>"."<input type=".'text'." name=".'alterlink'."><br/><br/>";
        echo "<input type=".'submit'." value=".'修改'.">";
        echo "</form>";
        echo "</div>";
        $alteractivity=$_POST["alteractivity"];
        $alterlink=$_POST["alterlink"];
        date_default_timezone_set("Asia/Taipei");
        $date=date("Y/m/d");
        if(isset($alteractivity)){
        $sqlupdate="UPDATE activity SET time='$date',li='$alteractivity',link='$alterlink' WHERE li='$li'";
        $result = mysqli_query($link, $sqlupdate);
        echo "<script>alert('修改成功'); location.href = 'admin.php';</script>";
        }
?>