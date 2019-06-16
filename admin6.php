<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>外借書目</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
    $link = mysqli_connect( 
        'localhost',  // MySQL主機名稱 
        'roger',       // 使用者名稱 
        'aZxcv7904',  // 密碼
        'phpproject');  // 預設使用的資料庫名稱
        $sql="select * from recommend";
        echo "<table bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px'; class='tableeeeee'>";
        echo "<tr bgcolor='#f5f290'>"."<td>"."書名"."</td>"."<td>"."作者"."</td>"."<td>"."出版社"."</td>"."<td>"."e-mail"."</td>"."</tr>";
        if ( $result = mysqli_query($link, $sql) ) {
            while( $row = mysqli_fetch_assoc($result) ){
                
                echo"<tr>"."<td>".$row["recommendname"]."</td>"."<td>".$row["recommendauthor"]."</td>"."<td>".$row["recommendbookfrom"]."</td>"."<td>".$row["recommendmail"]."</td>"."</tr>";
            }
        }
?>
