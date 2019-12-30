<?php
function getUserInfo($user_id,$db){
    $query = "select * from `users` where id=$user_id";
    $result =  $db->query($query);
    return $result?$result->fetch_assoc():null;
}

function getPosts($db){
    $page =  isset($_GET['page'])?abs(intval($_GET['page'])):1;
    $offset = $page ? ($page -1) * 3:0;
    $query = "SELECT * FROM `posts` WHERE `publish`=1 ORDER BY id DESC limit 6 offset $offset";
    $result =$db->query($query);
    $posts = [];
    while($post = $result->fetch_assoc()){
        $posts[] = $post;
    }
    return $posts;
}  

function getView($db, $id){

$sql="SELECT `id`,`tittle`, `body` from `posts` where id=$id";

$result= mysqli_query($db,$sql);
if(!$result) return false;
return mysqli_fetch_assoc($result);


}

function getUpdate($db){
    

    $query = "INSERT into `posts` set `publish`=1 ORDER BY id DESC ";
    $result =$db->query($query);
    return $result? $result->fetch_assoc():null;
}  



 
function viewuserPost($db, $user_id){
    $sql= "SELECT * from `posts` where `user_id` = $user_id";

    $result= mysqli_query($db,$sql);
    $viewss=[];

    while($view=mysqli_fetch_assoc($result)){
        $viewss[]=$view;   
    }
    return $viewss;
}



function genPagenationLinks($db, $limit=3){
    $result = $db->query("SELECT count(*) as total from posts WHERE `publish`=1");

    $total = $result->fetch_assoc()['total'];

    $counter = 0;

    for ($i = 0; $i <= $total; $i+=$limit ){
        $counter++; 
    }

    $links = [];

    for ($i=0; $i < $counter; $i++)
    {
        $page = $i+1;
        $links[] = "<a class=\"btn btn-link\" href=\"?page=$page\">$page</a>";
    }
    return implode($links);
}

function getPost($post_id,$db){

$query="SELECT * from `posts` where id=$post_id";
$result= $db->query($query);

if(!$result) return null;

return $result->fetch_assoc();


}
function getComments ($id,$db){
    $id = mysqli_real_escape_string($db,$id);
    $query = "SELECT C.id,C.post_id, C.comment, C.user_id, U.name, U.username FROM `comments` C INNER JOIN `users` U on U.id=C.user_id WHERE `post_id`={$id}";
    $result = $db->query($query);
    $data = [];
    if(!$result) return $data;
    while($comment = $result->fetch_assoc()){
        $data[] = $comment;
    }
    return $data;

}

?>