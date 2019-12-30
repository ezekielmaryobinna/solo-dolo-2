<?php 
session_start();
include_once '../db/db.php';

if(isset($_POST['_type']) && $_POST['_type'] === 'login')  {

$username=mysqli_real_escape_string($db,$_POST['username']);
$password=mysqli_real_escape_string($db,$_POST['password']);

$query= "SELECT * from `users` where username='%s'";
$squery= sprintf($query,$username);
$result= $db->query($squery);

if($db->affected_rows > 0){
    try {
         $user = $result->fetch_assoc();
         
         if(password_verify($password,$user['password'])){
            
             $_SESSION['user_id']  = $user['id'];
             header("location: ../index.php");
         }else{
             $_SESSION['error'] = "Invalid password!.";
             header("location: ../login.php");
         }
    } catch (\Exception $e) {
        var_dump($e);
    }
 }else{
     $_SESSION['error'] = "Invalid Username!.";
     header("location: ../login.php");
 }


}else{
 header('location: ../login.php');

}






















?>