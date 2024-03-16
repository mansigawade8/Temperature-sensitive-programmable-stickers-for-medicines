<?php
$name = $_POST['name'];
$temp = $_POST['temp'];
$time = $_POST['time'];
$wtemp = $_POST['wtemp'];

if (!empty($name)  || !empty($temp) || !empty($time) || !empty($wtemp)  ) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "practice";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
        
    } else {
        $SELECT = "SELECT name From med Where name = ? Limit 100";
        $INSERT = "INSERT Into med (name,temp,time,wtemp) values(?,?,?,?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

    
        if ($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("siii", $name,   $temp, $time, $wtemp);
            $stmt->execute();
        }
        $stmt->close();
        $conn->close();
        $link="button.php";
            echo "<center><a href=".$link." >back</a>";
    }

} else{
    echo "All fields are required";
    die();
}


?>
