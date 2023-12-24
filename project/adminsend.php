<?php

$link = mysqli_connect( 
    'db',  // MySQL主機名稱 
    'roger',       // 使用者名稱 
    'aZxcv7904',  // 密碼
    'phpproject');  // 預設使用的資料庫名稱
    $sql="SELECT * FROM send"; 
    echo "<table width=70%  border=3>";
        if ( $result = mysqli_query($link, $sql) ) {
            while( $row = mysqli_fetch_assoc($result) ){ 
                echo"<tr>"."<td>".$row["sendno"]."</td>"."<td>".$row["sendname"]."</td>"."<td>".$row["sendauthor"]."</td>"."<td>".$row["sendbookfrom"]."</td>"."<td>".'<img src="'.$row["sendurl"].'" />'."</td><td>".$row["sendaccount"]."</td><td>".$row["sendmail"]."</td><td>".$row["sendtime"]."</td>"."</tr>";
        }
    }




?>