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
            <li><h2><a href="record.php" rel="noopener noreferrer">借閱紀錄</a></h2></li>
            <li><h2><a href="recommend.php" rel="noopener noreferrer">我要推薦</a></h2></li>
            <li><h2><a href="comment.php" rel="noopener noreferrer">我要留言</a></h2></li>
            <li><h2 style="background-color:#F5F290;"><a href="return.php" rel="noopener noreferrer">我要還書</a></h2></li>
        </ul>
   </div>
<?php
    session_start();
    // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        require '/mailer/src/Exception.php';    
        require '/mailer/src/PHPMailer.php';
        require '/mailer/src/SMTP.php';
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
    if(!isset($_SESSION["user"])){
        echo "<script>alert('請先登入'); location.href = 'library.php';</script>";
    }
    $link = mysqli_connect( 
        'localhost',  // MySQL主機名稱 
        'roger',       // 使用者名稱 
        'aZxcv7904',  // 密碼
        'phpproject');  // 預設使用的資料庫名稱
        $account=$_COOKIE["user"];
        $sql="select * from send where sendaccount='$account'";
        echo "<form method=".'POST'.">";
        echo "<div class=".'choose'.">";
        echo "<h2>請選擇要還的書目：</h2>";
        echo "<select name='return'>";
        if ( $result = mysqli_query($link, $sql) ) {
            while( $row = mysqli_fetch_assoc($result) ){
                echo "<option value='$row[sendname]'>".$row["sendname"]."</option>"."<br/>";
               }
           }
        echo "</select>";
        echo "<input type=".'submit'." value=".'確認還書'.">";
        echo "</form>";
        echo "</div>";
            
        $returnname=$_POST["return"];
        $sql="select reservename,reservemail from reserve where reservename='$returnname'";
        if ( $result = mysqli_query($link, $sql) ) {
            $row = mysqli_fetch_assoc($result);
            if(isset($row[reservename])){
                            try {
                                //Server settings
                                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                                $mail->isSMTP();                                            // Set mailer to use SMTP
                                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                $mail->Username   = 'xxxxxxx@gmail.com';                     // SMTP username
                                $mail->Password   = 'xxxxxx';                               // SMTP password
                                $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
                                $mail->Port       = 465;                                    // TCP port to connect to
                            
                                //Recipients
                                $mail->setFrom('from@example.com', 'LibraryAdmin');
                                $mail->addAddress($row[reservemail]);     // Add a recipient
                                $mail->addAddress('ellen@example.com');               // Name is optional
                                $mail->addReplyTo('info@example.com', 'Information');
                                $mail->addCC('cc@example.com');
                                $mail->addBCC('bcc@example.com');
                            
                                // Attachments
                                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                            
                                // Content
                                $subject='預約書籍通知';
                                $subject="=?UTF-8?B?".base64_encode($subject)."?=";
                                $mail->isHTML(true);                                  // Set email format to HTML
                                $mail->Subject = $subject;
                                $mail->Body    = nl2br('您所預約的書籍'.$row[reservename].'已有館藏');
                                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            
                                $mail->send();
                                echo 'Message has been sent';
                            } catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                    
                        }
                    }
        if(isset($returnname)){
        $sql="select * from send where sendname='$returnname'";
        if ( $result = mysqli_query($link, $sql) ) {
            $row = mysqli_fetch_assoc($result);
            $SQLCreate="INSERT into unsend VALUES('$row[sendno]','$row[sendname]','$row[sendauthor]','$row[sendbookfrom]','$row[sendurl]')";
            $insertresult = mysqli_query($link, $SQLCreate);  
        }
        $SQLDelete="DELETE FROM send WHERE sendname='$returnname'";
        $result = mysqli_query($link, $SQLDelete);
        echo "<script>alert('歸還成功');location.href = 'return.php';</script>";
    }
        
                
            
        
    
?>