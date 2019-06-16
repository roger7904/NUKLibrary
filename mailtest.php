<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/mailer/src/Exception.php';
require '/mailer/src/PHPMailer.php';
require '/mailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);



    $now=time();
    $sqltime="select sendname,sendmail,sendtime from send";
    if ( $resulttime = mysqli_query($link, $sqltime) ) {
        while( $row = mysqli_fetch_assoc($resulttime) ){
            if(($now-$row[sendtime])>100){
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                    $mail->isSMTP();                                            // Set mailer to use SMTP
                    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'kobe7904@gmail.com';                     // SMTP username
                    $mail->Password   = 'aZxcv7904';                               // SMTP password
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
                    $subject="=?UTF-8?B?".base64_encode($subject)."?=";
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = '還書通知';
                    $mail->Body    = nl2br('您所借的書籍'.$row[sendname].'已到期，請在一分鐘內歸還，否則將刪除此帳號');
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }
    }
  


    


?>