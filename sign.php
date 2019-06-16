  
    <?php
        $link = mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'roger',       // 使用者名稱 
            'aZxcv7904',  // 密碼
            'phpproject');  // 預設使用的資料庫名稱
        $signaccount=$_POST["signaccount"];
        $signpassword=$_POST["signpassword"];
        $signpassword2=$_POST["signpassword2"];
        if(isset($signaccount) && $signpassword==$signpassword2){
        if(isset($signaccount)){
            $sql="select signaccount from sign";
            if($result = mysqli_query($link, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    if ($signaccount==$row[signaccount]) {
                    $flag=1;
            }
          }
        }
        if(isset($flag) && $flag==1){
            echo "<script>alert('帳號重複，請重新註冊'); location.href = 'library.php';</script>";
        }else{
            $SQLCreate="INSERT into sign(signaccount,signpassword) VALUES('$signaccount','$signpassword')";
            $insertresult = mysqli_query($link, $SQLCreate);   
            echo "<script>alert('註冊成功'); location.href = 'library.php';</script>";
        }
    }
}else{
    echo "<script>alert('密碼輸入不相同，請重新註冊'); location.href = 'library.php';</script>";
}
    ?>