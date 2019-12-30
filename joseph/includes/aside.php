
<?php if($user!==null){?>
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
                    <strong>Welcome: <?= $user['name']?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="list-group">
                        <a href="create-post.php" class="list-group-item list-group-item-action active">Create Post</a>
                        <a href="#" class="list-group-item list-group-item-action">My Posts</a>
                        <a onclick="document.getElementById('logout').submit()"  class="dropdown-item" href="#">logout</a>
                    <form method="POST" id="logout" action="./action/logout.php">
                        <input type="hidden" name="_type" value="logout">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>  <?php }?>