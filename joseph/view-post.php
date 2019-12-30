<?php 
session_start();
require_once './db/db.php';
include './includes/functions.php';

$id=isset($_GET['id'])?$_GET['id']:null;

$post=getPost($id,$db);
 
$createdby= ($post)? getUserInfo($post['user_id'],$db):null;
$comments= getComments($post['id'],$db);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?=$post['tittle'];?></title>
  </head>
  <body>
    <?php include './includes/nav.php' ?>
    <div class="container mt-4">
        <section class="col-md-9 col-12 card">
           <div class="card-body">
                <div class="row">
                        <div class="col-12">
                            <div class="h2 text-dark post-title"><?=$post['tittle'];?></div>
                        </div>
                        <div class="col-12 text-black-50">
                              by :  <?=$createdby['name'];?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?=$post['body'];?>
                    
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12">
                     <h3>Comments <h3>
                    </div>
                    <div class="col-12">
                    <?= (count($comments)?'':'No comments for this post'); ?>
                    <?php foreach($comments as $comment): ?>
                    <div class="row my-2 justify-content-between">
                      <div class="col-2">
                      <?= $comment['username']; ?>
                      </div>
                     <div class="col-8 card">
                     <?= $comment['comment']; ?>
                     </div>

                    </div>
                    <?php endforeach; ?>
                    </div>

                    </div>
           </div>
        </section>
        <?php include './includes/aside.php'; ?>
        <?php if($user&&$post):  ?>
           <div class="row mt-4">
                <div class="col-md-9 col-9 ">
                    <div class="card">
                        <div class="card-body">
                        <form action="./action/create-comment.php" method="post">
                            <input type="hidden" name="_type" value="comment">
                            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                            <div class="form-row">
                                <div class="col">
                                    <textarea 
                                    name="comment" 
                                    id="comment" 
                                    class="form-control"
                                    cols="30" 
                                    placeholder="Enter your comment <?= $user['name'] ?>"
                                    rows="10"
                                    ></textarea>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">comment</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>   
        <?php endif;?>
    </div>
    
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js" ></script>
  </body>
</html>