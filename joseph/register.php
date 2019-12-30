<?php
session_start();
$error = $_SESSION['error'] ?? NULL;
unset($_SESSION['error'])
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>REGISTER </title>
</head>

<body>
    <?php include_once './includes/nav.php' ?>
    <div class="container">
        <div class="row justify-content-center">
            <section class="col-md-9 col-12">
                <?php if ($error == true) : ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <div class="col-8-md-10">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3> Register Here</h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form method="POST" action="./action/register.php">
                                    <input type="hidden" value="register" name="_type">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-1-12 col-form-label">Name: </label>
                                        <div class="col-sm-1-12">
                                            <input type="text" class="form-control" name="name" id="input name" placeholder="name">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="'col-sm-1-12 col-form-label">Username: </label>
                                        <div class="col-sm-1-12">
                                            <input type="text" class="form-control" name=username id="input username" placeholder="username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-1-12 col-form-label">password:</label>
                                        <div class="col-sm-1-10">
                                            <input type="password" class="form-control" name="password" id="input password" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-secondary">Submit</button>

                                    </div>


                            </div>
                            </form>

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