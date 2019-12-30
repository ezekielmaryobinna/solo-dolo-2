<?php 
session_start();
include_once '../db/db.php';

if(isset($_POST['_type']) && $_POST['_type'] === 'register') {
// run registration code

$username=mysqli_real_escape_string($db,$_POST['username']);
$name=mysqli_real_escape_string($db,$_POST['name']);
$password=mysqli_real_escape_string($db,$_POST['password']);

$testuser="select * from `users` where username='$username'";
$querytest= mysqli_query($db,$testuser);
if($querytest && mysqli_affected_rows($db)){
    
    $_SESSION['error']="user already exist";
    header('location: ../register.php');
};
$hashedPassword = password_hash($password,PASSWORD_ARGON2I);
$insertquery= sprintf( "INSERT INTO `users`(`name`,`username`,`password`) VALUES('%s','%s','%s')", $name,$username,$hashedPassword );
$result= mysqli_query($db,$insertquery);

if($result){
    $user_id = mysqli_insert_id($db);
    $_SESSION['user_id'] = $user_id;
echo "alert('succesfull')";
header('location:../index.php');

}else{
    header('location:../register.php');
}
}













?>