<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>常見問題</title>
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
<link rel="stylesheet" href="commonproblem.css">
<div class="wrap">
<div class="title">
      <a href="library.php"><img src="1.jpg" width="87px" length="87px" alt=""></a>
      <h1><a href="library.php" >NUK Library</a></h1>
    </div>
    <div class="logout">
    <?php
          session_start();
          if(isset($_SESSION["user"])){
          $account=$_COOKIE["user"];
          }
          echo "<h2>".$account."您好"."</h2>";
        ?>
        <a href="logout.php"><h2>登出</h2></a>
    </div>
    <div class="clear"></div>
    <div class="information">
      <h2><a href="libraryinformation.php">本館資訊</a></h2>
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
      <h2 style="background-color:#F5F290;"><a href="commonproblem.php">常見問題</a></h2>
    </div>
    <div class="QA">
        <h2 style="background-color:#F5F290;"><a href="commonproblem.php">所有留言</a></h2>
    </div>
    <div class="question">
        <h2><a href="myask.php">我的留言</a></h2>
    </div>
       <?php
          $link = mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'roger',       // 使用者名稱 
            'aZxcv7904',  // 密碼
            'phpproject');  // 預設使用的資料庫名稱
            $sql="SELECT * FROM ask"; 
            echo "<table width=70%  border=3 class='table' bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
            echo"<tr bgcolor='#f5f290'>"."<td>"."提問者帳號"."</td>"."<td>"."提問人"."</td>"."<td>"."主題"."</td>"."<td>"."內容"."</td>"."<td>"."提問時間"."</td>"."<td>"."管理者回覆"."</td>"."</tr>";
                if ( $result = mysqli_query($link, $sql) ) {
                    while( $row = mysqli_fetch_assoc($result) ){ 
                        echo"<tr>"."<td>".$row["askaccount"]."</td>"."<td>".$row["askname"]."</td>"."<td>".$row["asktitle"]."</td>"."<td>".$row["askcontent"]."</td>"."<td>".$row["askdate"]."</td>"."<td>".$row["replycontent"]."</td>"."</tr>";
                }
            }          


        ?>
</div>

</body>
</html>