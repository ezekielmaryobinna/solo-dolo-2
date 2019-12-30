<?php
session_start();
require_once './db/db.php';
require_once './includes/functions.php';
$posts = getPosts($db);
$query = $dbh->prepare('SELECT * FROM `posts` WHERE `published`= 0');
$query->execute();
$_posts = $query->fetchAll(PDO::FETCH_CLASS);
$pageLinks = genPagenationLinks($db);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>home</title>
</head>

<body>
  <?php include_once './includes/nav.php' ?>
  <div class="container mt-5">
    <div class="row">
      <section class="col-md-9 col-12">
        <div class="row">
          <?php foreach ($posts as $post) :  ?>
            <?php include './includes/postcard.php' ?>

          <?php endforeach; ?>
          <p><?= $pageLinks ?></p>
        </div>
      </section>
    
      <?php include_once './includes/aside.php' ?>
    </div>

  </div>
  <script src="./js/jquery-3.3.1.slim.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
</body>

</html>