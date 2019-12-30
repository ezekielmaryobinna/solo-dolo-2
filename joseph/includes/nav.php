<?php
session_start();
require_once './db/db.php';
require_once './includes/functions.php';

$user_id = $_SESSION['user_id'] ?? null;
$user = $user_id?getUserInfo($user_id,$db):null;
?>


<nav class="navbar navbar-expand-sm navbar-light bg-success">
    <a class="navbar-brand" href="#">law blog</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if($user!==NULL){  ?>
            <li class="nav-item">
                <a class="nav-link" href="create-post.php">Create Post</a>
            </li>
            <?php }?>
</ul>
            
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <?php if($user===null){?>
            <li class="nav-item">
                <a class="nav-link" href="./register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./login.php">Login</a>
            </li>
          <?php }else{?>
         <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$user['name']?></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">update profile</a>
                    <a onclick="document.getElementById('logout').submit()"  class="dropdown-item" href="#">logout</a>
                    <form method="POST" id="logout" action="./action/logout.php">
                        <input type="hidden" name="_type" value="logout">
                    </form>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>