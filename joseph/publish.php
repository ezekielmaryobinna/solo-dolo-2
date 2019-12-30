<?php include_once './db/db.php'; ?>
<?php 
session_start();
include_once './includes/functions.php';


$sql ="select * from `posts` WHERE `publish` = 0";
$result= mysqli_query($db,$sql);





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
<div class="row justify-content-center mt-5">
<div class="col-10">
<div class="card">
<table class="table table-bordered" >
<tr>
    <thead>
        <th>id</th>
        <th>tittle</th>
        <th>user_id</th>
        <th>publish</th>
        <th>actions</th>
    </thead>


</tr>
<tbody> <?php if(mysqli_num_rows($result)):
    while($viewpost=mysqli_fetch_array($result)):
    ?>
<tr>
    <td><?=$viewpost['id'];?></td>
    <td><?=$viewpost['tittle'];?>
    <td><?=$viewpost['user_id'];?></td>
    <td><?=$viewpost['publish'];?></td>

    <td>
                                <a class="btn btn-xs btn-info" href="./edit.php?id=<?= $viewpost['id']; ?>">edit</a>
                                <form action='delete.php?id=<?= $viewpost['id']; ?>' method="POST">
                                    <button type="submit" class="btn btn-xs btn-danger">delete</button>
                                </form>
                            </td>

</tr>


</tbody>
    <?php endwhile;
    endif;  ?>

</table>





</div>
</div>
</div>

<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

</body>

</html>