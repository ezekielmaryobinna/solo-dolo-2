?php
session_start();
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
$db=mysqli_connect("localhost","root","","joseph");

if(mysqli_connect_errno()){

die ("uneabble to connect". mysqli_error($db)); }

if(isset($_POST['login'])){

$admin=mysqli_real_escape_string($db,$_POST['admin']);
$password= mysqli_real_escape_string($db,$_POST['password']);

$sql="SELECT * from `admins` where admin='%s'";
$squery= sprintf($sql,$admin);
$result= $db->query($squery);
    
    if($result && mysqli_affected_rows($db) > 0){
        $user = mysqli_fetch_assoc($result);
        
        //check password;
        if(password_verify($password,$user['password'])){
            //log user in;
             $_SESSION['user'] = $user['id'];
                header("location:..//index.php");
            }
           
            
        }
    }