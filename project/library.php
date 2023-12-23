<?php
session_start();
        $n=0;
         $nn=0;
          $link = mysqli_connect('localhost','roger', 'aZxcv7904','phpproject');
          $SQL="SELECT count(rr.reserveno) as reserveno
                FROM reserve rr";
           if ( $result = mysqli_query($link, $SQL) ) {
             while( $row = mysqli_fetch_assoc($result) ){
             $nn=$row['reserveno'];
         }
       }
       $link = mysqli_connect('localhost','roger', 'aZxcv7904','phpproject');
       $SQL="SELECT count(r.account) as account
             FROM record r";
        if ( $result = mysqli_query($link, $SQL) ) {
          while( $row = mysqli_fetch_assoc($result) ){
          $n=$row['account'];
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>NUK Library</title>
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
   <link rel="stylesheet" href="http://bit.ly/cZwmXV" type="text/css" media="screen" /> <script src="http://bit.ly/9wn5Wi" type="text/javascript"></script> <script src="http://sites.google.com/site/freeisking/public-1/scriptaculous.js?load=effects,builder" type="text/javascript"></script> <script src="http://bit.ly/aFnqib" type="text/javascript"></script>
  </head>
<body>
<?php
        $n1=array();
        $i=0;
        $n2=array();
        $n3=array();
         $link = mysqli_connect('localhost','roger', 'aZxcv7904','phpproject');
         $SQL="SELECT recordname, MIN(recordurl) as recordurl
               FROM record
               GROUP BY recordname
               ORDER BY COUNT(recordname) DESC LIMIT 4";
          if ( $result = mysqli_query($link, $SQL) ) {
            while( $row = mysqli_fetch_assoc($result) ){
            $n1[$i]=$row['recordname'];
            $n2[$i]=$row['recordurl'];
            $i++;
        }
      }
      ?>
    <link rel="stylesheet" href="library.css">
  <div class="wrap">
    <div class="title">
      <img src="1.jpg" width="87px" length="87px" alt=""><a href="#"></a>
      <h1><a href="library.php" >NUK Library</a></h1>
    </div>
    <div class="login">
    <button id="myBtn1" ><h2>註冊</h2></button>
       <div id="myModal1" class="modal1">
          <!-- Modal content -->
          <div class="modal-content1">
            <span class="close1">&times;</span>
            <form action="sign.php" method="POST"> 
                帳號： 
                <input type="text" class="account" name="signaccount">
                <div class="clear"></div>
                密碼：
                <input type="text" class="password" name="signpassword">
                <div class="clear"></div>
                <br/>
                密碼確認：
                <input type="text" class="password" name="signpassword2">
                <br/>
                <input type="submit" value="註冊" >
                <br/>
              </div></form>
        </div>
        <script>
        
          jQuery.noConflict();
          
        jQuery(function(){
            
            var modal = document.getElementById("myModal1");
                // Get the button that opens the modal
                var btn = document.getElementById("myBtn1");
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close1")[0];
                // When the user clicks on the button, open the modal 
                btn.onclick = function() {
                  modal.style.display = "block";
                }
                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                  if (event.target == modal1) {
                    modal.style.display = "none";
                  }
                }
          });
        
        </script>
       <button id="myBtn"><h2>登入</h2></button>

       <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <form action="checktest.php" method="POST"> 
                帳號：
                <input type="text" class="account" name="account">
                <div class="clear"></div>
                <br/>
                <br/>
                密碼：
                <input type="text" class="password" name="password">
                <div class="clear"></div>
                <br/>
                <input type="submit" value="登入" >
                <br/>
              </div></form>
           
        </div>
        <script>
       jQuery.noConflict();
          jQuery(function(){
                  var modal = document.getElementById("myModal");
                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];
                // When the user clicks on the button, open the modal 
                btn.onclick = function() {
                  modal.style.display = "block";
                }
                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                  if (event.target == modal) {
                    modal.style.display = "none";
                  }
                }
              });
        </script>
      
      <a href="logout.php"><h3>登出</h3></a>
    </div>
    <div class="clear"></div>
    <?php
      $account = isset($_COOKIE['user']) ? $_COOKIE['user'] : '';
      //$account=$_COOKIE['user'];
      if(isset($_SESSION['user'])){
        echo "<h2 class='roger'>".$account."您好"."</h2>";
      }else{
        // donothing
      }
    ?>
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
            <li><a href="comment.php">我要留言</li>
            <li><a href="return.php">我要還書</li>
          </ul>
        </div></div>
      
      <div class="bg"></div>
      <h2><a href="commonproblem.php">常見問題</a></h2>
    </div>
    <div class="board">
    <ul>
          <?php
          $link = mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'roger',       // 使用者名稱 
            'aZxcv7904',  // 密碼
            'phpproject');  // 預設使用的資料庫名稱
            $sql="select * from bulletin";
            if ( $result = mysqli_query($link, $sql) ) {
                while($row = mysqli_fetch_assoc($result)){  
                echo "<li><span>$row[li]</span></li>";
                }
            }
          ?>
        </ul>    
          </div>
    <div class="data">
    <h2>本日借閱數據</h2>
      <HR size="5px" color="#707070">
        <div class="borrowman">
          <div class="gray">借閱</div>
          <div class="borrowmanvalue"><?=$n?>人</div>
        </div>
        <div class="reserveman">
          <div class="gray">預約</div>
          <div class="reservemanvalue"><?=$nn?>人</div>
        </div>
        <div class="clear"></div>
        <div class="borrowbook">
          <div class="gray">借閱</div>
          <div class="borrowbookvalue"><?=$n?>冊</div>
        </div>
        <div class="reservebook">
          <div class="gray">預約</div>
          <div class="reservebookvalue"><?=$nn?>冊</div>
        </div>
        <div class="clear"></div>
        
    </div>
    <div class="clear"></div>
    <div class="box">
    <div class="news">
      <h2 class="hot" style="background-color:#F5F290;"><a href="">熱門借閱排行</a></h2>
    </div>
    <div class="clear"></div>
      <div class="bookpic">
      <div class="book1">
          <img src="<?=$n2[0]?>"><?=$n1[0]?></a>　
        </div>
        <div class="book2">
          <img src=" <?=$n2[1]?>"><?=$n1[1]?></a>　
        </div>
        <div class="book3">
          <img src="<?=$n2[2]?>"><?=$n1[2]?></a>
        </div>
        <div class="book4">
          <?php if (isset($n2[3])) : ?>
            <img src="<?= $n2[3] ?>">
          <?php endif; ?>

          <?php if (isset($n1[3])) : ?>
            <?= $n1[3] ?>
          <?php endif; ?>
        </div>
      </div> 
    </div>
  </div>

      <div class="service">
          <h2>熱門服務</h2>
          <button1 class="paper"><a href="#" class="paper" style="text-decoration:none;">碩博士論文</a></button1>
          <button1 class="test"><a href="#" class="test" style="text-decoration:none;">各項檢定</a></button1>
          <div class="clear"></div>
          <button1 class="exam"><a href="#" class="exam" style="text-decoration:none;">歷屆考題</a></button1>
          <button1 class="call"><a href="#" class="call" style="text-decoration:none;">聯絡我們</a></button1>
        </div>
    <div class="clear"></div>
    <div class="bottom">
      <div class="copyright">Copyright © 2019 NUK Library</div>
      <div class="date">更新日期：2019/5/26</div>
      <div class="cellphone">連絡電話：07-123-4567
      </div>
      <div class="email">電子郵件：php@gmail.com</div>
    </div>
</div>
<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  //require '/mailer/src/Exception.php';  
  //require '/mailer/src/PHPMailer.php';
  //require '/mailer/src/SMTP.php';
  require 'Exception.php';   
  require 'PHPMailer.php';
  require 'SMTP.php';
  // Instantiation and passing `true` enables exceptions
  $link = mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'roger',       // 使用者名稱 
    'aZxcv7904',  // 密碼
    'phpproject');  // 預設使用的資料庫名稱
  $mail = new PHPMailer(true);
  $now=time();
  $sqltime="select sendname,sendmail,sendtime from send";
  if ( $resulttime = mysqli_query($link, $sqltime) ) {
      while( $row = mysqli_fetch_assoc($resulttime) ){
        if(isset($row['sendtime'])){
          if(($now-$row['sendtime'])>30 && ($now-$row['sendtime'])<250){
              try {
                  //Server settings
                  $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                  $mail->isSMTP();                                            // Set mailer to use SMTP
                  $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                  $mail->Username   = 'xxxxxxxx@gmail.com';                     // SMTP username
                  $mail->Password   = 'xxxxxxx';                               // SMTP password
                  $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
                  $mail->Port       = 465;                                    // TCP port to connect to
              
                  //Recipients
                  $mail->setFrom('from@example.com', 'LibraryAdmin');
                  $mail->addAddress($row[sendmail]);     // Add a recipient
                  $mail->addAddress('ellen@example.com');               // Name is optional
                  $mail->addReplyTo('info@example.com', 'Information');
                  $mail->addCC('cc@example.com');
                  $mail->addBCC('bcc@example.com');
              
                  // Attachments
                  //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
              
                  // Content
                  $subject='還書通知';
                  $subject="=?UTF-8?B?".base64_encode($subject)."?=";
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->Subject = $subject;
                  $mail->Body    = nl2br('您所借的書籍'.$row[sendname].'已到期，請盡速歸還');
                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
              
                  $mail->send();
              } catch (Exception $e) {
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              }
          }
        }
      }
  }
?>
</body>
</html>