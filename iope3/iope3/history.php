<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe Transfer
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mt-5">
                    <div class="card-header">
                        <h4><center>Inventory List</h4></center>
                    <div class="card-body">
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Temperature</th>
                                    <th>Time</th>
                                    <th>Warning Temperature</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $con = mysqli_connect("localhost","root","","practice");

$db= $con;
$tableName="med";
if(isset($_GET['delete']))
{
  $id= validate($_GET['delete']);
  $condition =['id'=>$id];
  $deleteMsg=delete_data($db, $tableName, $condition);
  header("location:history.php");

}
function delete_data($db, $tableName, $condition){

    $conditionData='';
    $i=0;
    foreach($condition as $index => $data){
        $and = ($i > 0)?' AND ':'';
         $conditionData .= $and.$index." = "."'".$data."'";
         $i++;
    }

  $query= "DELETE FROM ".$tableName." WHERE ".$conditionData;
  $result= $db->query($query);
  if($result){
    $msg="data was deleted successfully";
  }else{
    $msg= $db->error;
  }
  return $msg;
}

function validate($value) {
$value = trim($value);
$value = stripslashes($value);
$value = htmlspecialchars($value);
return $value;
}
?>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","practice");

                                    $query = "SELECT * FROM med";
                                    $query_run = mysqli_query($con, $query);
                                    
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['temp']; ?></td>
                                                <td><?= $row['time']; ?></td>
                                                <td><?= $row['wtemp']; ?></td>
                                                <td><a href="history.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="4">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js">
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>