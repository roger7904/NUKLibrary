<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我要推薦</title>
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
            <li><h2><a href="record.php" rel="noopener noreferrer">借閱紀錄</a></h2></li>
            <li><h2 style="background-color:#F5F290;"><a href="recommend.php" target="_blank" rel="noopener noreferrer">我要推薦</a></h2></li>
            <li><h2><a href="comment.php" rel="noopener noreferrer">我要留言</a></h2></li>
            <li><h2><a href="return.php" rel="noopener noreferrer">我要還書</a></h2></li>
        </ul>
   </div>
   <div class="table">
      <form action="#" class="tablee" method="POST">
      <h2>書名：</h2><input type="text" name="recommendname" style="padding:5px 60px;border:1 none;-webkit-border-radius: 5px;" class="input">
      <h2>作者：</h2><input type="text" name="recommendauthor" style="padding:5px 60px;border:1 none;-webkit-border-radius: 5px;" class="input">
      <h2>出版社：</h2><input type="text" name="recommendbookfrom" style="padding:5px 60px;border:1 none;-webkit-border-radius: 5px;" class="input">
      <h2>你的e-mail：</h2>　<input type="text" name="recommendmail" style="padding:5px 60px;border:1 none;-webkit-border-radius: 5px;" class="input"><br><br>
      <input type="submit" value="確定送出">
      <input type="reset" value="重新填寫">
      </form>
      </div>
    
    
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
    if(!isset($_SESSION["user"])){
        echo "<script>alert('請先登入'); location.href = 'library.php';</script>";
    }
    $link = mysqli_connect( 
        'db',  // MySQL主機名稱 
        'roger',       // 使用者名稱 
        'aZxcv7904',  // 密碼
        'phpproject');  // 預設使用的資料庫名稱

    $recommendname = isset($_POST["recommendname"]) ? $_POST["recommendname"] : '';
    $recommendauthor = isset($_POST["recommendauthor"]) ? $_POST["recommendauthor"] : '';
    $recommendbookfrom = isset($_POST["recommendbookfrom"]) ? $_POST["recommendbookfrom"] : '';
    $recommendmail = isset($_POST["recommendmail"]) ? $_POST["recommendmail"] : '';
     
    if (isset($recommendname) && $recommendname !== '') {
      // 在插入之前检查是否已经存在相同的推荐名字
      $checkDuplicateQuery = "SELECT * FROM recommend WHERE recommendname = '$recommendname'";
      $duplicateResult = mysqli_query($link, $checkDuplicateQuery);

      if ($duplicateResult && mysqli_num_rows($duplicateResult) > 0) {
        // 已经存在相同的推荐名字，处理重复推荐的逻辑
        echo "<script>alert('該書目已經被推薦過'); location.href = 'recommend.php';</script>";
      } else {
        // 不存在相同的推荐名字，执行插入操作
        $SQLCreate = "INSERT into recommend VALUES('$recommendname','$recommendauthor','$recommendbookfrom','$recommendmail')";
        $insertresult = mysqli_query($link, $SQLCreate);

        if ($insertresult) {
            echo "<script>alert('推薦成功，我們會考慮將書目列入館藏'); location.href = 'recommend.php';</script>";
        } else {
            echo "<script>alert('插入失敗'); location.href = 'recommend.php';</script>";
        }
      }
    } else {
      //donothing
    } 

?>
