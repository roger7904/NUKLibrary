<?php
    session_start();
    if(!isset($_SESSION["user"])){
        echo "<script>alert('請先登入'); location.href = 'library.php';</script>";
    }
    $link = mysqli_connect( 
    'localhost',   
    'roger',        
    'aZxcv7904',  
    'phpproject');  
    $password=$_POST["password"];
    $account=$_COOKIE["user"];
    $sql="SELECT signpassword FROM sign where signaccount='$account'";
    if ( $result = mysqli_query($link, $sql) ) {
        $row = mysqli_fetch_assoc($result);
        if($row[signpassword]==$password){
            $flag=1;
            echo "1";
        }
        else{
            echo "<script>alert('密碼錯誤'); location.href = 'search.php';</script>";
        }
    }
        if(isset($flag)){
        $reserveno=$_POST["sendno"];
        $reservemail=$_POST["reservemail"];
        $sql="select * from send where sendno=$reserveno";
        $account=$_COOKIE["user"];
        if ( $result = mysqli_query($link, $sql) ) {
            $row = mysqli_fetch_assoc($result);
            $SQLCreate="INSERT into reserve VALUES('$row[sendno]','$row[sendname]','$row[sendauthor]','$row[sendbookfrom]','$row[sendurl]','$account','$reservemail')";
            $insertresult = mysqli_query($link, $SQLCreate); 
            echo "<script>alert('預約成功，若有館藏將會以email通知您'); location.href = 'library.php';</script>";
        }
    }

?>