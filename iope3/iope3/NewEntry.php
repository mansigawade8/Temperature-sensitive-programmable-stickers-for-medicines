<?php
$name = $_POST['name'];
$medid = $_POST['medid'];
$rid = $_POST['rid'];

if (!empty($name) || !empty($medid) || !empty($rid) ) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "practice";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
        
    } else {
        $SELECT = "SELECT medid From entry Where medid = ? Limit 100";
        $INSERT = "INSERT Into entry (name,medid,rid) values(?,?,?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("i", $medid);
        $stmt->execute();
        $stmt->bind_result($medid);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
    
        if ($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sii", $name, $medid,  $rid);
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
