<?php include_once './db/db.php'; ?>
<?php 
session_start();
include_once './includes/functions.php';

//comments to show posts for user 

if(isset($_GET['id'])){
  $user_id = mysqli_real_escape_string($db,$_GET['id']);
  $views=viewuserPost($db, $user_id);
  
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<title>Admin</title>
</head>

<body>
<?php include './includes/navv.php'; ?>
<div class="container mt-5">
    <div class="row">
      <section class="col-md-9 col-12">
        <?php foreach($views as $view): ?>
      <div class="h2 text-dark post-title"><?=$view['tittle'];?></div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-12 mb-2">
    <div class="card">
<div class="card-body"> 

<?=$view['body'];?>

</div>
    </div>
        </div>
        <?php endforeach;?>
      </section>
        </div>
</div>
</div>
</div>
</div>

<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

</body>

</html>