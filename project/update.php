<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>館藏查詢</title>
</head>
<body>
<link rel="stylesheet" href="admin1.css">
<div class="wrap">
    <div class="title">
      <img src="1.jpg" width="87px" length="87px" alt=""><a href="#"></a>
      <h1><a href="admin.php">Keeper</a></h1>
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
</div>
</div>
</body>
</html>
<?php
$link = mysqli_connect( 
    'db',  // MySQL主機名稱 
    'roger',       // 使用者名稱 
    'aZxcv7904',  // 密碼
    'phpproject');  // 預設使用的資料庫名稱
$allno=$_GET["allno"];
$sqlupdate="select * FROM allbooks WHERE allno=$allno";
$result = mysqli_query($link, $sqlupdate); 
    if ( $result = mysqli_query($link, $sqlupdate) ) {
        $row = mysqli_fetch_assoc($result);
            echo "<form action='updateresult.php' method='POST' class='ad'>";
            echo "<h2>編號:</h2>"."<h2>".$row[allno]."</h2>";
            echo "<input type='hidden' value='$allno' name='allno'></br>";
            echo "<h2>書名:</h2>"."<input type='text' placeholder='$row[allname]' name='allname' style='padding:5px 100px;border:1 none;-webkit-border-radius: 5px;'></br>";
            echo "<h2>作者:</h2>"."<input type='text' placeholder='$row[allauthor]' name='allauthor' style='padding:5px 100px;border:1 none;-webkit-border-radius: 5px;'></br>";
            echo "<h2>出版社:</h2>"."<input type='text' placeholder='$row[allbookfrom]' name='allbookfrom' style='padding:5px 100px;border:1 none;-webkit-border-radius: 5px;'></br>";
            echo "<h2>圖片url:</h2>"."<input type='text' placeholder='$row[allurl]' name='allurl' style='padding:5px 100px;border:1 none;-webkit-border-radius: 5px;'></br>";
            echo "<input type='submit'>";
            echo "</form>";          
    }
?>