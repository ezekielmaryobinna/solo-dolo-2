<div class="col-md-6 col-lg-4 col-12 mb-2">
    <div class="card">
        <img src="https://via.placeholder.com/150" class="card-img" alt="">
        <div class="card-body">
            <h5 class="card-title"><?=htmlentities($post['tittle'])?></h5>
            <p> <?= substr( $post['body'], 0,40) ?><?=(strlen($post['body']) > 30)?' ...':'' ?>  </p>
                <p><a href="./view-post.php?id=<?= $post['id'] ?>">read more</a></p>
        </div>
    </div>
</div>