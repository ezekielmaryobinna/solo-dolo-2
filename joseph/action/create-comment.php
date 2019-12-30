<?php
session_start();
include_once '../db/db.php';
if(isset($_POST['_type']) && $_POST['_type'] === 'comment'){
$post_id = mysqli_real_escape_string($db,$_POST['post_id']);
$comment = mysqli_real_escape_string($db,$_POST['comment']);
$user_id = $_SESSION['user_id'];
$query = "INSERT INTO `comments`(`comment`,`post_id`,`user_id`) VALUES('%s','%d','%d')";

$result = $db->query(sprintf($query,$comment,$post_id,$user_id));

if(!$result){
    $_SESSION['error'] = 'Error'. $db->error(); 
}
header("location: ../view-post.php?id=$post_id");



}