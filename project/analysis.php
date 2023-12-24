<?php
    $n1=array();
    $i=0;
    $n2=array();
     $link = mysqli_connect('localhost','roger', 'aZxcv7904','phpproject');
     $SQL="SELECT recordname,count(recordname) as num
           FROM record
           GROUP BY recordname";
      if ( $result = mysqli_query($link, $SQL) ) {
        while( $row = mysqli_fetch_assoc($result) ){
        $n1[$i]=$row['recordname'];
        $n2[$i]=$row['num'];
        $i++;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>外借書目</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<link rel="stylesheet" href="admin1.css">
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
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="clear"></div>
        <div class="ana" id="piechart"></div>
        </div>
        <script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['book', 'Hot'],
  <?php
    if(isset($n1[0])){
        echo "['".$n1[0]."',".$n2[0]."],";
    }
    if(isset($n1[1])){
        echo "['".$n1[1]."',".$n2[1]."],";
    }
    if(isset($n1[2])){
        echo "['".$n1[2]."',".$n2[2]."],";
    }
    if(isset($n1[3])){
        echo "['".$n1[3]."',".$n2[3]."],";
    }
    if(isset($n1[4])){
        echo "['".$n1[4]."',".$n2[4]."],";
    }
    if(isset($n1[5])){
        echo "['".$n1[5]."',".$n2[5]."],";
    }
    if(isset($n1[6])){
        echo "['".$n1[6]."',".$n2[6]."],";
    }
    if(isset($n1[7])){
        echo "['".$n1[7]."',".$n2[7]."],";
    }
    if(isset($n1[8])){
        echo "['".$n1[8]."',".$n2[8]."],";
    }
    if(isset($n1[9])){
        echo "['".$n1[9]."',".$n2[9]."],";
    }
  ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'熱門書目圓餅圖', 'width':800, 'height':750};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</body>
</html>