<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>借閱確認</title>
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
        <li><h2 style="background-color:#F5F290;"><a href="search.php" target="_blank" rel="noopener noreferrer">館藏查詢</a></h2></li>
            <li><h2><a href="record.php" rel="noopener noreferrer">借閱紀錄</a></h2></li>
            <li><h2><a href="recommend.php" rel="noopener noreferrer">我要推薦</a></h2></li>
            <li><h2><a href="comment.php" rel="noopener noreferrer">我要留言</a></h2></li>
            <li><h2><a href="return.php" rel="noopener noreferrer">我要還書</a></h2></li>
   </div>
</div>
<?php
//session_start();要做判斷帳號是否一樣
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
if(!isset($_SESSION["user"])){
        echo "<script>alert('請先登入'); location.href = 'library.php';</script>";
    }
$link = mysqli_connect( 
    'db',  // MySQL主機名稱 
    'roger',       // 使用者名稱 
    'aZxcv7904',  // 密碼
    'phpproject');  // 預設使用的資料庫名稱
    echo "<form method=".'POST'." class=".'passwd'.">";
    echo "<h2>確認密碼:</h2>"."<input type=".'text'." name=".'sendpassword'.">";
    echo "<h2>請輸入email:</h2>"."<input type=".'text'." name=".'sendmail'."><br/>";
    echo "<input type=".'submit'." value=".'我要借閱'.">";
    echo "</form>";
    $unsendno=$_GET["unsendno"];
    $sendpassword = isset($_POST["sendpassword"]) ? $_POST["sendpassword"] : '';
    $sendmail = isset($_POST["sendmail"]) ? $_POST["sendmail"] : '';
    $account=$_COOKIE["user"];
    date_default_timezone_set("Asia/Taipei");
    $date=date("Y/m/d h:i:s");
    $now=time();
    if(isset($sendpassword)){
        $sql="select signpassword from sign where signaccount='$account'";
        if ( $result = mysqli_query($link, $sql) ) {
            $row = mysqli_fetch_assoc($result);
            if($row['signpassword']==$sendpassword){
        $sql="SELECT * FROM unsend where unsendno=$unsendno";
if ( $result = mysqli_query($link, $sql) ) {
    $row = mysqli_fetch_assoc($result);
    $SQLCreate2="INSERT into record VALUES('$account','$row[unsendname]','$row[unsendauthor]','$row[unsendbookfrom]','$row[unsendurl]','$date')";
    $insertresult2 = mysqli_query($link, $SQLCreate2);
}
            }
        }
    }
    $sql="select signpassword from sign where signaccount='$account'";
    if(isset($sendpassword)){
    if ( $result = mysqli_query($link, $sql) ) {
        $row = mysqli_fetch_assoc($result);
        if($row['signpassword']==$sendpassword){
        $sql="SELECT * FROM unsend where unsendno=$unsendno";
        if ( $result = mysqli_query($link, $sql) ) {
            $row = mysqli_fetch_assoc($result);
            $SQLCreate="INSERT into send VALUES('$row[unsendno]','$row[unsendname]','$row[unsendauthor]','$row[unsendbookfrom]','$row[unsendurl]','$account','$sendmail','$date','$now')";
            $insertresult = mysqli_query($link, $SQLCreate);
            $SQLDelete="DELETE FROM unsend WHERE unsendno=$unsendno";
            $deleteresult = mysqli_query($link, $SQLDelete);
            echo "<script>alert('借閱成功，期限到後會以email通知'); location.href ='search.php';</script>";
        }
        
    }
    else{
        echo "<script>alert('密碼錯誤'); </script>";
    }
}
    }

?>
    