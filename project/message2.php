<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <link rel="stylesheet" href="message2.css">
   <div class="wrap">
   <div class="title">
      <img src="1.jpg" width="87px" length="87px" alt=""><a href="#"></a>
      <h1><a href="admin.php" >Keeper</a></h1>
    </div>
    <div class="hello">
    <h2>管理者您好</h2>
    </div>
    <div class="logout">
    <h2><a href="logout.php" rel="noopener noreferrer">登出</a></h2>
    </div>
    <br/>
    <br/>
    <hr size="3px" width="100%" color="#F5F290">
    <div class="content">
        <div class="bg"> <span class="btn">使用者回覆</span></div>
        <form action="#"  method="POST" accept-charset="utf-8">
            <div class="text">
                <textarea name="comment" style="width:500px;height:400px;" >Enter text here...</textarea>
                <input type="submit">
            </div>
        </form>


    </div>   
</div>
   <?php
    $asktitle=$_GET["asktitle"];
    $comment=$_POST["comment"];
    $link = mysqli_connect('localhost','roger', 'aZxcv7904','phpproject');
    mysqli_set_charset($link, "UTF8");
    if(isset($comment)){
        $sqlupdate="UPDATE ask SET replycontent='$comment' WHERE asktitle='$asktitle'";
$result = mysqli_query($link, $sqlupdate);
        echo "<script>alert('回覆成功'); location.href = 'admin4.php';</script>";
}
?>



</body>
</html>