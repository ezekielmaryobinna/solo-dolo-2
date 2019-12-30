<?php include_once './db/db.php'; ?>
<?php 
session_start();
include_once './includes/functions.php';

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($db,$_GET['id']);
    $post=getView($db,$id);


}
if(count($_POST))
{
    
        //start insertion to database
    
        $tittle = mysqli_escape_string($db,$_POST['tittle']) ;
        $body = mysqli_escape_string($db,$_POST['body']) ;
        $id = mysqli_real_escape_string($db,$_POST['id']);
    
        $sql = sprintf("UPDATE `posts` SET `tittle` = '%s', `body`= '%s', `publish`='1' WHERE id=%d",
                
                $tittle,
                $body,
                $id
            
            );
$result= mysqli_query($db,$sql);

if($result) {

    echo 'successful';
    header("location:./publish.php");
}
 


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
<div class="row justify-content-center mt-5">
<div class="col-10">
<div class="card">
    <div class="card-body">
        <form action="edit.php?id=<?= @$post['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
           <div class="form-group" >
            <label>tittle</label>
             <input type="text" name="tittle"  class="form-control"value = "<?=$post['tittle']?>">
           </div>
           <div class="form-group">
           <label for="body">body</label>
                              <textarea 
                                type="text" 
                                name="body" 
                                id="body" 
                                rows="10"
                                draggable="false"
                                class="form-control" 
                             
                                aria-describedby="body"> <?= $post['body']?></textarea>

</div>
<div class="form-group">
                                <button type="submit" class="btn btn-primary ">
                                    update
                                </button>
                            </div>

        </form>



    </div>

</div>
</div>
</div>

<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

</body>

</html>