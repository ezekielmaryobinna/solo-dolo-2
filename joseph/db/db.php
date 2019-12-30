<?php $db=mysqli_connect("localhost","root","","joseph");

if(mysqli_connect_errno()){

die ("uneabble to connect". mysqli_error($db));
}


/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=joseph;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

















?>