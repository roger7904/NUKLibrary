<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>本館資訊</title>
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script>
     var JQ=$.noConflict();
       JQ(document).ready(function(){
           JQ(".servers").mouseover(function(){
               JQ(".inserver:eq(0)").slideToggle()
               JQ(".inserver:not(:eq(0)").slideUp()
           })
           JQ(".servers").mouseout(function(){
               JQ(".inserver:eq(0)").slideToggle()
               JQ(".inserver").stop();
           })
       })
   </script>
</head>
<body>
<link rel="stylesheet" href="libraryinformation.css">
<div class="wrap">
<div class="title">
      <a href="library.php"><img src="1.jpg" width="87px" length="87px" alt=""></a>
      <h1><a href="library.php" >NUK Library</a></h1>
    </div>
    <div class="logout">
    <?php
        session_start();
        $account = isset($_COOKIE['user']) ? $_COOKIE['user'] : '';
        if(isset($_SESSION['user'])){
          echo "<h2 class='roger'>".$account."您好"."</h2>";
        }else{
          // donothing
        }
     ?>
        <a href="logout.php"><h2>登出</h2></a>
    </div>
    <div class="clear"></div>
    <div class="information">
      <h2 style="background-color:#F5F290;"><a href="libraryinformation.php">本館資訊</a></h2>
      <h2><a href="aboutus.php">關於我們</a></h2>
      <h2><a href="latestnews.php">最新消息</a></h2>
      <div class="jq-block">
        <h2 class="servers"><a href="#">各項服務</a></h2>
        <div class="inserver" style="display:none">
          <ul>
          <li><a href="search.php">館藏查詢</a></li>
            <li><a href="record.php">借閱紀錄</li>
            <li><a href="recommend.php">我要推薦</li>
            <li><a href="comment.php">我的留言</li>
            <li><a href="return.php">我要還書</li>
          </ul>
        </div>
      </div>
      <h2><a href="commonproblem.php">常見問題</a></h2>
    </div>
    <div class="opentime">
        <h2>開館時間</h2>
    </div>
    <div class="opentimepic">
        <img src="https://i.imgur.com/vvGOlFe.jpg" alt="">
    </div>
    <div class="contactinformation">
    <h2>聯絡資訊</h2>
    </div>
    <div class="phone">
        <h2>電話：</h2>
        <h3>(07)1234567</h3>
    </div>
    <div class="email2">
    <h2>電子郵件：</h2>
        <h3>php@gmail.com</h3>
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