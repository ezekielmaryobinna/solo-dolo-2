<?php      
session_start();
if(!isset($_SESSION['user_id'])) {

header('location:login.php');

}
$error=$_SESSION['error']?? NULL;
unset($_SESSION['error']);


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Welcome</title>
  </head>
  <body>
    <?php include './includes/nav.php' ?>
    <div class="container">
        <div class="row mt-3">
            <?php if($error !== null):?>
                <div class="col-12">
                  <div class="alert alert-danger">
                      <?= $error ?>
                  </div>
                </div>
            <?php endif;?>
            <section class="col-md-9 col-12">
                <div class="row justify-content-center ">
                    <div class="col-md-8 col-12">
                        <form method="POST" action="./action/create-post.php">
                            <input type="hidden" value="create-post" name="_type" >
                            <div class="form-group form-row">
                              <label for="tittle">Post Title</label>
                              <input type="text" name="tittle" id="tittle" class="form-control" placeholder="Enter Post Title" aria-describedby="titte">
                              <small id="tittle" class="text-muted">Enter the Title for your post</small>
                            </div>
                            <div class="form-group form-row">
                              <label for="body">Content</label>
                              <textarea 
                                type="text" 
                                name="body" 
                                id="body" 
                                rows="10"
                                draggable="false"
                                class="form-control" 
                                placeholder="Type In your post" 
                                aria-describedby="body"></textarea>
                              <small id="body" class="text-muted">type your post.</small>
                            </div>
                            <div class="form-row justify-content-end">
                                <button class="btn btn-primary" type="submit">Create Post</button>
                            </div>

                        </form>
                    </div>
                </div>
            </section>
            
              <aside class="col-md-3 col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row justify-content-center">
                      <div class="col-6">
                        <img class="rounded-circle img-thumbnail" src="https://via.placeholder.com/150" alt="User image">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <strong>Welcome: <?=$user['name'];?></strong>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="list-group">
                          <a href="#" class="list-group-item list-group-item-action active">Create Post</a>
                          <a href="#" class="list-group-item list-group-item-action">My Posts</a>
                          <a href="#" class="list-group-item list-group-item-action disabled">logout</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </aside>
        </div>
    </div>
    
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js" ></script>
  </body>
</html>