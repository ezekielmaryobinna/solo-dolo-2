<?php
session_start();
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <?php include_once './includes/nav.php' ?>
    <div class="container">
        <div class="row justify-content-center">
            <section class="col-md-9 col-12">
                <?php if ($error == true) :   ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <div class="col-8-md-10">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>login now</h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form method="POST" action="./action/login.php">
                                    <input type="hidden" value="login" name="_type">

                                    <div class="form-group row">
                                        <label for="username" class="'col-sm-1-12 col-form-label">Username: </label>
                                        <div class="col-sm-1-12">
                                            <input type="text" class="form-control" name=username id="username" placeholder="username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-1-12 col-form-label">password:</label>
                                        <div class="col-sm-1-10">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <button type="submit" name="login" class="btn btn-secondary">Submit</button>

                                    </div>


                            </div>

                        </div>

                    </div>
            </section>
        </div>
    </div>
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

</body>

</html>