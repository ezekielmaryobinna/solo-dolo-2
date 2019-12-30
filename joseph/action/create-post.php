<?php  
session_start();
include_once '../db/db.php';

if(isset($_POST['_type']) && $_POST['_type'] === 'create-post') {
    $tittle = mysqli_real_escape_string($db,$_POST['tittle']);
    $body = mysqli_real_escape_string($db,$_POST['body']);
    $user_id=$_SESSION['user_id'];

    $query= sprintf( "INSERT INTO `posts`(`tittle`,`body`,`user_id`) VALUES('%s','%s','%s')", $tittle,$body,$user_id);
    $result= mysqli_query($db,$query);

    if(!$result){
        $_SESSION['error'] = 'Error: '. mysqli_error($db); 
    }
    header('location: ../index.php');


}








?>