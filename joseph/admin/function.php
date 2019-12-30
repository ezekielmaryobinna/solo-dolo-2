<?php
function logInUser($admin,$password,$db){
    
    $sql = "SELECT * FROM  `admins` WHERE admin='%s' limit 1";
    $result = mysqli_query($db,sprintf($sql,mysqli_real_escape_string($db,$admin)));
    
    if($result && mysqli_affected_rows($db) > 0){
        $user = mysqli_fetch_assoc($result);
        //check password;
        if(password_verify($password,$user['password'])){
            //log user in;
            if(!session_status() === PHP_SESSION_ACTIVE){
                session_start();
            }
            $_SESSION['user'] = $user['id'];
            return $user;
        }else{
            return false;
        }
    }else{
        return false;
    }
    
  }?>