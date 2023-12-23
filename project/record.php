<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>借閱紀錄</title>
</head>
<body>
<link rel="stylesheet" href="search.css">
    <div class="wrap">
    <div class="title">
      <a href="library.php"><img src="1.jpg" width="87px" length="87px" alt=""></a>
      <h1><a href="library.php" >NUK Library</a></h1>
      </div>
      <div class="hello">
      <?php
          session_start();
          if(isset($_SESSION["user"])){
          $account=$_COOKIE["user"];
          }
          echo "<h2>".$account."您好"."</h2>";
        ?>
      </div>
      <div class="logout">
      <h2><a href="logout.php" rel="noopener noreferrer">登出</a></h2>
    </div>
      <div class="clear"></div>
      <div class="information">
      <h2><a href="libraryinformation.php">本館資訊</a></h2>
      <h2><a href="aboutus.php">關於我們</a></h2>
      <h2><a href="latestnews.php">最新消息</a></h2>
      <h2 style="background-color:#F5F290;"><a href="variousservice.php">各項服務</a></h2>
      <h2><a href="commonproblem.php">常見問題</a></h2>
    
   </div>
   <div class="services">
        <ul style="list-style-type:none">
            <li><h2><a href="search.php" rel="noopener noreferrer">館藏查詢</a></h2></li>
            <li><h2 style="background-color:#F5F290;"><a href="record.php" target="_blank" rel="noopener noreferrer">借閱紀錄</a></h2></li>
            <li><h2><a href="recommend.php" rel="noopener noreferrer">我要推薦</a></h2></li>
            <li><h2><a href="comment.php" rel="noopener noreferrer">我要留言</a></h2></li>
            <li><h2><a href="return.php" rel="noopener noreferrer">我要還書</a></h2></li>
        </ul>
   </div>
   <?php
    if(!isset($_SESSION["user"])){
        echo "<script>alert('請先登入'); location.href = 'library.php';</script>";
    }
    $link = mysqli_connect( 
      'localhost',  // MySQL主機名稱 
      'roger',       // 使用者名稱 
      'aZxcv7904',  // 密碼
      'phpproject');
        $account=$_COOKIE["user"];
        $sql="SELECT * FROM record where account='$account'";
        echo "<table width=65% class='tablee' bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
        echo"<tr bgcolor='#f5f290'>"."<td>"."借閱者帳號"."</td>"."<td>"."書名"."</td>"."<td>"."作者"."</td>"."<td>"."出版社"."</td>"."<td>"."圖片"."</td>"."<td>"."借閱時間"."</td>"."</tr>";
                if ( $result = mysqli_query($link, $sql) ) {
                    while( $row = mysqli_fetch_assoc($result) ){
                        echo"<tr>"."<td>".$row["account"]."</td>"."<td>".$row["recordname"]."</td>"."<td>".$row["recordauthor"]."</td>"."<td>".$row["recordbookfrom"]."</td>"."<td>".'<img src="'.$row["recordurl"].'" />'."<td>".$row["recorddate"]."</td>"."</tr>";
                    }
                }
?>
    </div>
</body>
</html>