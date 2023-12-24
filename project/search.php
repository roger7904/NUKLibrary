<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>館藏查詢</title>
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
          echo "<h2>".$account."您好"."</h2>";
          }
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
            <li><h2 style="background-color:#F5F290;"><a href="search.php" target="_blank" rel="noopener noreferrer">館藏查詢</a></h2></li>
            <li><h2><a href="record.php" rel="noopener noreferrer">借閱紀錄</a></h2></li>
            <li><h2><a href="recommend.php" rel="noopener noreferrer">我要推薦</a></h2></li>
            <li><h2><a href="comment.php" rel="noopener noreferrer">我要留言</a></h2></li>
            <li><h2><a href="return.php" rel="noopener noreferrer">我要還書</a></h2></li>
        </ul>
   </div>
</div>
<?php
    //session_start();
    if(!isset($_SESSION["user"])){
        echo "<script>alert('請先登入'); location.href = 'library.php';</script>";
    }
    $link = mysqli_connect( 
        'db',  // MySQL主機名稱 
        'roger',       // 使用者名稱 
        'aZxcv7904',  // 密碼
        'phpproject');  // 預設使用的資料庫名稱
            echo "<form  method=".'GET'." class=".'read'.">";
            echo "<h1>所有書目瀏覽：</h1>";
            echo "<select name='allbooks' class=".'option'.">";
            $sql2="SELECT allname FROM allbooks";
                if ( $result2 = mysqli_query($link, $sql2) ) {
                    while( $row2 = mysqli_fetch_assoc($result2) ){
                        echo "<option value='$row2[allname]'>".$row2["allname"]."</option>"."<br/>";
                    }
                }
            echo "</select>";
            echo "</form>";
            echo "<div class=".'read'.">";
            echo "<h1>查詢書目:</h1>";
            echo "<form  method=".'POST'.">";
            echo "<input type=".'text'." name=".'search'."><br/><br/>";
            echo "<input type=".'submit'.">";
            echo "</form>";
            echo "</div>";
            //$search=$_POST["search"];
            $search = isset($_POST["search"]) ? $_POST["search"] : '';
            $sql3="SELECT * FROM unsend where unsendname LIKE '%$search%'" ;
            $result3 = mysqli_query($link, $sql3) ;
            $row3 = mysqli_fetch_assoc($result3) ;
            $sql4="SELECT * FROM send where sendname LIKE '%$search%'" ;
            $result4 = mysqli_query($link, $sql4) ;
            $row4 = mysqli_fetch_assoc($result4) ;
            if(isset($search)){
            if(isset($row3)){
                echo "<table width=50% class='tablee'>";
                echo"<tr bgcolor='#f5f290'>"."<td>"."編號"."</td>"."<td>"."書名"."</td>"."<td>"."作者"."</td>"."<td>"."出版社"."</td>"."<td>"."圖片"."</td>"."<td>"."我要借閱"."</td>"."</tr>";
                echo"<tr bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>"."<td>".$row3["unsendno"]."</td>"."<td>".$row3["unsendname"]."</td>"."<td>".$row3["unsendauthor"]."</td>"."<td>".$row3["unsendbookfrom"]."</td>"."<td>".'<img src="'.$row3["unsendurl"].'" />'."</td>"."<td>"."<a href='borrow.php?unsendno=".$row3['unsendno']."'>我要借閱</a>"."</td>"."</tr>";
            }
            elseif(isset($row4)){
                echo "<div class=".'ead'.">";
                echo "<h1>此書已被借閱</h1>";
                echo "<form action=".'reserve.php'." method=".'POST'.">";
                echo "<input type=".'hidden'." value=".$row4[sendno]." name=".'sendno'.">";
                echo "<h2>請輸入信箱:</h2>"."<input type=".'text'." name=".'reservemail'."><br/><br/>";
                echo "<h2>密碼確認:</h2>"."<input type=".'text'." name=".'password'."><br/><br/>";
                echo "<input type=".'submit'." value=".'我要預約'.">";
                echo "</form>";
                echo "</div>";
            }
            else{
                echo "<div class=".'ead'.">";
                echo "<h1>查無此書</h1>";
                echo "<a href='recommend.php'><h2>我要推薦此書</h2></a>";
                echo "</div>";
            }
        }
    
?>
</body>
</html>
