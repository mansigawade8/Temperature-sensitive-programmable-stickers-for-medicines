<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe Transfer</title>
    <link rel="stylesheet" href="sticker.css">
</head>
<body>
<div class="hero">
   <div class="road"></div>
   <div class="truck">
    <img src="truckhead.png" alt=""></div>
    <div class="rectangle">
    <?php
$con = mysqli_connect("localhost","root","","practice");
$sql = "SELECT distinct rid FROM entry";
$res = mysqli_query($con,$sql);
session_start();?>
<?php
$url = $_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url");
$a=array(20,21,22,23,24,25,26,27,28,29,30);
$random_keys=array_rand($a);
echo $a[$random_keys];
?>

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                <center>
                    <h2>Name  -  <?php echo $_SESSION['name'];?></h2>
                    <h2>Receiver ID  -<?php echo $_SESSION['receiverid'];?></h2>
                </center>
                </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            </thead>
                            <tbody>
                                <?php 
                                    $conn = mysqli_connect("localhost","root","","practice");
                                    
                                    if(isset($_SESSION['receiverid']))
                                    {
                                        $filtervalues = $_SESSION['receiverid'];
                                        $query = "SELECT * FROM med WHERE CONCAT(rid) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <div class="out">
                                                    <div>Name :  <?= $row['name']; ?></div>
                                                    <div>ID : <?= $row['medid']; ?></div>
                                                    <?php if($a[$random_keys] > $row['wtemp'] ) : ?>
                                                        <div class="card_red" function="data()">
                                                    <?php elseif( $a[$random_keys] > $row['temp']) : ?>
                                                        <div class="card_orange" function="data()">
                                                    <?php else : ?>
                                                        <div class="card_green" function="data()">
                                                    <?php endif; ?>
                                                
                                                    </div>
                                                    </div>
                                              
                                                <?php
                                            }
                                        }else{
                                            echo "<center><h2>Data Not Found<h2><center>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
</body>
<style>
    .card_green{
        border: none;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: #4CAF50;
        margin-right: 10px;
       
        margin-bottom: 10px;
    }
    .card_red{
        border: none;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: #FF0000;
        margin-right: 10px;
       
        margin-bottom: 10px;
    }
    .card_orange{
        border: none;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: #FFA500;
        margin-right: 10px;
       
        margin-bottom: 10px;
    }
    .out{
        border: 2px;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: black;
        margin-right: 10px;
       
        margin-bottom: 10px;
        }
</style>
</html>
<script>


if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(showPosition);
} else { 
  x.innerHTML = "Geolocation is not supported by this browser.";
}


function showPosition(position) {
  const {latitude, longitude} = position.coords;
  link = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&units=metric&appid=dd3e2a44007364058284edc8fa9852ce`;
  var request = new XMLHttpRequest();
  request.open('GET',link,true);
  request.onload = function(link){
    var obj = JSON.parse(this.response);
    console.log(obj);
    document.getElementById('demo').innerHTML = obj.main.temp;
    
  }
  if(request.status==200){
    console.log("ERROR");
  }
  request.send();
}


</script>