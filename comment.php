<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的留言</title>
</head>
<body>
<link rel="stylesheet" href="comment.css">
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
            <li><h2><a href="record.php" rel="noopener noreferrer">借閱紀錄</a></h2></li>
            <li><h2><a href="recommend.php" rel="noopener noreferrer">我要推薦</a></h2></li>
            <li><h2 style="background-color:#F5F290;"><a href="comment.php" target="_blank" rel="noopener noreferrer">我要留言</a></h2></li>
            <li><h2><a href="return.php" rel="noopener noreferrer">我要還書</a></h2></li>
        </ul>
   </div>
   <div class="table">
       <form action="#" method="POST">
   <table>
        <tr>
            <td>我的名字</td>
            <td>
                <input type="text" style="padding:5px 150px;border:0 none;margin-left:85px;" name="askname">
            </td>
        </tr>
        
        <tr>
            <td>標題</td>
            <td>
            <input type="text" style="padding:5px 150px;border:0 none;margin-left:85px;" name="asktitle">
            </td>
        </tr>
        <tr>
            <td>留言內容</td>
            <td>
            <textarea name="askcontent" id="" cols="80" rows="10" ></textarea>
            </td>
        </tr>
   </table>
   
   <input type="reset" value="重新填寫" class="return">
        <input type="submit" value="確定送出" class="check" >
        </form>
   </div>
   <div class="clear"></div>
   <div class="bottom">
        <div class="copyright">Copyright © 2019 NUK Library</div>
        <div class="date">更新日期：2019/5/26</div>
        <div class="cellphone">連絡電話：07-123-4567</div>
        <div class="email">電子郵件：php@gmail.com</div>
      </div>
</div>
    
</body>
</html>
<?php
        session_start();
        if(!isset($_SESSION["user"])){
            echo "<script>alert('請先登入'); location.href = 'library.php';</script>";
        }
        $link = mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'roger',       // 使用者名稱 
            'aZxcv7904',  // 密碼
            'phpproject');  // 預設使用的資料庫名稱
            $account=$_COOKIE["user"];
            $askname=$_POST["askname"];        
            $asktitle=$_POST["asktitle"];
            $askcontent=$_POST["askcontent"];
            date_default_timezone_set("Asia/Taipei");
            $date=date("Y/m/d h:i:s");
            if(isset($askname)){
            $SQLCreate="INSERT into ask(askaccount,askname,asktitle,askcontent,askdate) VALUES('$account','$askname','$asktitle','$askcontent','$date')";
            $insertresult = mysqli_query($link, $SQLCreate); 
            echo "<script>alert('留言成功'); location.href = 'comment.php';</script>";
            }
    
?>