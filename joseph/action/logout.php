<?php 
session_start();
if($_POST['_type'] && $_POST['_type']==='logout') {
unset($_SESSION['user_id']);

session_destroy();


}

header('location: ../index.php');




?>