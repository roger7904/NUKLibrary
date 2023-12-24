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
     
    <h2 class="analysis"><a href="analysis.php">後台分析</a></h2>
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
        <div class="clear"></div>
    <div class="add">
    <form method="POST">
    <h2>新增書目:<br/></h2>
    <h2>書名:<input type="text" name="allname" style="padding:5px 100px;border:1 none;-webkit-border-radius: 5px;"><br/></h2>
    <h2>作者:<input type="text" name="allauthor" style="padding:5px 100px;border:1 none;-webkit-border-radius: 5px;"><br/></h2>
    <h2>出版社:<input type="text" name="allbookfrom" style="padding:5px 100px;border:1 none;-webkit-border-radius: 5px;"><br/></h2>
    <h2>圖片url:<input type="text" name="allurl" style="padding:5px 100px;border:1 none;-webkit-border-radius: 5px;"><br/></h2>
    <input type="submit">
</form>
</div>
</div>
</body>
</html>
<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require 'Exception.php';    
 require 'PHPMailer.php';
 require 'SMTP.php';
 // Instantiation and passing `true` enables exceptions
 $mail = new PHPMailer(true);
        $link = mysqli_connect( 
            'db',  // MySQL主機名稱 
            'roger',       // 使用者名稱 
            'aZxcv7904',  // 密碼
            'phpproject');  // 預設使用的資料庫名稱
            //$unsendno = isset($_POST["unsendno"]) ? $_POST["unsendno"] : 0;
            $allname = isset($_POST["allname"]) ? $_POST["allname"] : '';
            $allauthor = isset($_POST["allauthor"]) ? $_POST["allauthor"] : '';
            $allbookfrom = isset($_POST["allbookfrom"]) ? $_POST["allbookfrom"] : '';
            $allurl = isset($_POST["allurl"]) ? $_POST["allurl"] : '';

            if (isset($allname)) {
                $SQLCreate="INSERT into allbooks(allname,allauthor,allbookfrom,allurl) VALUES('$allname','$allauthor','$allbookfrom','$allurl')";
            $insertresult = mysqli_query($link, $SQLCreate);
            }
            if (isset($allname)) {
                $query = "SELECT MAX(unsendno) as max_unsendno FROM unsend";
                $result = mysqli_query($link, $query);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $max_unsendno = $row['max_unsendno'];

                    // 如果没有记录，将 'unsendno' 设置为1，否则加1
                    $unsendno = ($max_unsendno !== null) ? $max_unsendno + 1 : 1;

                    // 插入新记录
                    $SQLCreate = "INSERT into unsend(unsendno, unsendname, unsendauthor, unsendbookfrom, unsendurl) VALUES ('$unsendno', '$allname', '$allauthor', '$allbookfrom', '$allurl')";
                    $insertresult = mysqli_query($link, $SQLCreate);
                } 
                //$SQLCreate="INSERT into unsend(unsendname,unsendauthor,unsendbookfrom,unsendurl) VALUES('$allname','$allauthor','$allbookfrom','$allurl')";
                //$insertresult = mysqli_query($link, $SQLCreate);
            }
            
            $sql="SELECT * FROM allbooks"; 
            echo "<table width=70%  border=3 class='table' bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
            echo"<tr bgcolor='#f5f290'>"."<td>"."編號"."</td>"."<td>"."書名"."</td>"."<td>"."作者"."</td>"."<td>"."出版社"."</td>"."<td>"."圖片"."</td>"."<td>"."修改"."</td>"."<td>"."刪除"."</td>"."</tr>";
                if ( $result = mysqli_query($link, $sql) ) {
                    while( $row = mysqli_fetch_assoc($result) ){ 
                        echo"<tr>"."<td>".$row["allno"]."</td>"."<td>".$row["allname"]."</td>"."<td>".$row["allauthor"]."</td>"."<td>".$row["allbookfrom"]."</td>"."<td>".'<img src="'.$row["allurl"].'" />'."</td>"."<td>"."<a href='update.php?allno=".$row['allno']."'>修改</a>"."</td>"."<td>"."<a href='del.php?allno=".$row['allno']."'>刪除</a>"."</td>"."</tr>";
                }
            }

            $sql="select * from recommend where recommendname='$allname'";
            if ( $result = mysqli_query($link, $sql) ) {
                $row = mysqli_fetch_assoc($result);
                if(isset($row['recommendname'])){

            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'xxxxxxx@gmail.com';                     // SMTP username
                $mail->Password   = 'xxxxxxxx';                               // SMTP password
                $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 465;                                    // TCP port to connect to
            
                //Recipients
                $mail->setFrom('from@example.com', 'LibraryAdmin');
                $mail->addAddress($row['recommendmail']);     // Add a recipient
                $mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');
            
                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                // Content
                $subject='館藏增加通知';
                $subject="=?UTF-8?B?".base64_encode($subject)."?=";
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = nl2br('您所推薦的書籍'.$row['recommendname'].'已增加館藏');
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            $SQLDelete="DELETE FROM recommend WHERE recommendname='$row[recommendname]'";
                            $result = mysqli_query($link, $SQLDelete);
        }
    }
?>
