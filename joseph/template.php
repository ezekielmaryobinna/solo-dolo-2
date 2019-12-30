<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body> <?php include_once './includes/nav.php'?>
    <div class="container mt-3">
<div class="row">
<section class="col-md-9 col-10"></section>

<aside class="col-md-10 col-12">
<div class="cointainer">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                <div class="col-6">
                        <img class="rounded-circle img-thumbnail" src="https://via.placeholder.com/150" alt="User image">
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
</aside>

  
</div>


    </div>
    
</body>
</html>


<ul class="pagination justify-content-end">

<?php
$sql = "SELECT * FROM json_data";  
$rs_result1 = mysqli_query($connect, $sql);  
$row = mysqli_num_rows($rs_result1);

//print_r($rs_result1); die();
$limit = 10;  
$total_records = $row;  
//$total_pages = ceil($total_records / $limit)-220; 
 // calculate total pages
 $total_pages = ceil($row / $limit);

 $prev = $page-1;
 $next = $page+1; 
 $pagination_buttons =5;
 $last_page = $total_pages;
 $half = floor($pagination_buttons/2);

 //echo '<ul class="pagination">';
          if($page >= 5){
          echo '<li><a href="domain.php?page=1">First</a></li>';
          } 

         if($page < $pagination_buttons AND ($last_page == $pagination_buttons OR $last_page > $pagination_buttons)){

           for($i=1; $i<=$pagination_buttons; $i++){
             if($i == $page){             
               echo '<li class="active"><a href="domain.php?page='.$i.'">'.$i.'</a></li>';
             }
             else{
              echo '<li><a href="domain.php?page='.$i.'">'.$i.'</a></li>';
            }
           }

           if($last_page > $pagination_buttons){
             echo '<li><a href="domain.php?page='.($pagination_buttons+1).'">Next</a></li>';
           }          

         } 


        else if($page >= $pagination_buttons AND $last_page > $pagination_buttons){

          if(($page+$half) >= $last_page){
            echo '<li><a href="domain.php?page='.($last_page - $pagination_buttons).'">Previous</a></li>';

          for ($i=($last_page-$pagination_buttons)+1; $i<=$last_page; $i++) {

             if($i == $page){             
               echo '<li class="active"><a href="domain.php?page='.$i.'">'.$i.'</a></li>';
              }
             else{
              echo '<li><a href="domain.php?page='.$i.'">'.$i.'</a></li>';
              }

           }
           }
           else if(($page+$half) < $last_page){
              echo '<li><a href="domain.php?page='.(($page-$half)-1).'">Previous</a></li>';

            for ($i=($page-$half); $i<=($page+$half); $i++) {

             if($i == $page){             
               echo '<li class="active"><a href="domain.php?page='.$i.'">'.$i.'</a></li>';
              }
             else{
              echo '<li><a href="domain.php?page='.$i.'">'.$i.'</a></li>';
              }

           }

           echo '<li><a href="domain.php?page='.(($page+$half)+1).'">Next</a></li>';
           }

        }  

        if($page != $total_pages && $total_pages >= 6){
          echo '<li><a href="domain.php?page='.$total_pages.'">Last</a></li>';








    another code 

    // !!! make sure that page is set as a url param
if( !isset( $_GET[ 'page' ] )){
    $_GET[ 'page' ] = 0;
 }
 
 // find out how many rows there are total
 $totalRows = mysql_query( "SELECT COUNT(*) FROM table" ); 
 $totalRows = mysql_num_rows( $totalRows );
 // find out how many pages there will be
 $numPages = floor( $totalRows  / $perPage );
 
 $perPage = 15;
 $offset = floor( $_GET[ 'page' ] * $perPage );
 
 // get just the data you need for the page you are on
 $pageData = mysql_query( "SELECT * FROM table LIMIT $perPage OFFSET $offset" ); 
 then on the page to create the links
 
 // get the current url to replace
 
 for ($i=0; $i <= $numPages; $i++) {             
    if( $_GET[ 'page'] != $i ){          
        echo '<a href="/yourpage.php?page=' . $i + 1 . '">page '.( $i+1 ).'</a>';
     }else{      
        echo "page " . ( $i+1 );
    }
 }