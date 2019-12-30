<?php

session_start();
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
$db=mysqli_connect("localhost","root","","joseph");

if(mysqli_connect_errno()){

die ("uneabble to connect". mysqli_error($db)); }

if(isset($_POST['login'])){

$admin=mysqli_real_escape_string($db,$_POST['admin']);
$password= mysqli_real_escape_string($db,$_POST['password']);

$sql="SELECT * from `admins` where admin='%s'";
$squery= sprintf($sql,$admin);
$result= $db->query($squery);
    
    if($result && mysqli_affected_rows($db) > 0){
        $user = mysqli_fetch_assoc($result);
        
        //check password;
        if(password_verify($password,$user['password'])){
            //log user in;
             $_SESSION['user'] = $user['id'];
                header("location:../admin.php");
            }
           
            
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<title>Login</title>
</head>

<body class="bg-dark">

<div class="container">
<div class="row justify-content-center">
  <div class= "col-lg-8 col-md-8 bg-light mt-5 px-0">
    <h3 class="text-center text-light bg-danger p-3">Admin login </h3> 
    <form action="adminlogin.php" method="POST" class="p-4">
   <div class="form-group">
       <label>admin:</label>
       <input type="text" name="admin" class="form-control form-control-lg" placeholder="admin" required>
   </div>
   <div class="form-group">
     <label>password:</label>
       <input type="text" name="password" class="form-control form-control-lg" placeholder="password" required>
   </div>
   <div class="form-group">
      <button type="submit" name="login" class="btn btn-primary btn-block">submit</button>
   </div>
    </form> 
    </form> 
</div>
</div>



</div>





<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

</body>

</html>