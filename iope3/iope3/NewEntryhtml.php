<?php
$con = mysqli_connect("localhost","root","","practice");
$sql = "SELECT distinct receiverid FROM receiver";
$res = mysqli_query($con,$sql);
$sql1 = "SELECT distinct name FROM med";
$res1 = mysqli_query($con,$sql1);
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Safe Transfer</title>
</head>
<style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
  
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: -webkit-linear-gradient(left, #115cc4, #9b167e);
  background-image: url(skybg.png);
}
.container{
    color: rgb(34, 29, 128);
    background-color: white;
    height:470px;
    width: 400px;
    border-radius: 5%;
}
.out{
    background-color: rgb(255, 255, 255);
    height: 390px;
    width: 320px;
    border-radius: 3%;
    
}
.container form .out input{
    
  height: 40px;
  width: 300px;
  outline: none;
  padding-left: 10px;
  border: 1px solid blueviolet;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.container form .out select{
    
    height: 40px;
    width: 300px;
    outline: none;
    padding-left: 10px;
    border: 1px solid blueviolet;
    border-bottom-width: 2px;
    font-size: 17px;
    transition: all 0.3s ease;
  }
.container form .out input:focus{
  border-color: #09096e;
  /* box-shadow: inset 0 0 3px #fb6aae; */
}
.container form .out input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #b3b3b3;
}

</style>
<body>
  <center>
    <div class="container">
        <br>
    <h1>Add Medicine</h1><br>
 <form action="NewEntry.php" method="POST" class="registartion-form">
    <div class="out">
  <table>
   <tr><tr><tr></tr></tr>
    <td>
    <h3>Medicine Name</h3>
    <select name="name" id="">
      <option value="select">Select Medicine Name</option>
      <?php while($rows = mysqli_fetch_array($res1)){
         ?>
         <option value="<?php echo $rows['name']; ?> " ><?php echo $rows['name'];?>
         </option>
         <?php
      } 
      ?>
   </select>
    </td>
   </tr>
   <tr><tr><tr><tr><tr><tr><tr><tr></tr></tr></tr></tr></tr></tr></tr></tr><tr></tr>
   <tr>
    <td>
      <h3>Medicine ID</h3>
     <input type="text" name="medid" placeholder="Medicine ID" required>
    </td>
   </tr><tr><tr><tr><tr><tr><tr><tr><tr></tr></tr></tr></tr></tr></tr></tr></tr>
   <td>
    <h3>Receiver ID</h3>
    <select name="rid" id="">
      <option value="select">Select Receiver ID</option>
      <?php while($rows = mysqli_fetch_array($res)){
         ?>
         <option value="<?php echo $rows['receiverid']; ?> " ><?php echo $rows['receiverid'];?>
         </option>
         <?php
      } 
      ?>
   </select>
  </td>
   <tr><tr><tr><tr><tr><tr><tr><tr></tr></tr></tr></tr></tr></tr></tr></tr>
   <tr><tr><tr><tr><tr><tr><tr><tr></tr></tr></tr></tr></tr></tr></tr></tr>
   <tr><tr><tr><tr><tr><tr><tr><tr></tr></tr></tr></tr></tr></tr></tr></tr>
   <tr>
   </tr>
   <tr>
    <td colspan="2"><input id="myBtn" type="submit" class="submit"/></td>
   </tr>
  </table>
</div>
 </form>
</div>
</center>
</body>
</html>

