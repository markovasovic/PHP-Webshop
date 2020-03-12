<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


 
 
 
 function getPicture() {
     if (isset($_SESSION['art_id'])&&isset($_SESSION["color"])) {
         $id = $_SESSION['art_id'];
         $color = $_SESSION["color"];
     }
      $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
            mysqli_select_db($con, "web_shop");
            $query_ = mysqli_query($con, " SELECT image_name FROM web_shop.images where article_id ='".$id."' and img_color = '".$color."';
 ") or die(mysqli_error($con));
            while ($row = mysqli_fetch_assoc($query_)) {
                  
                  $picture = $row['image_name'];
            }
            return $picture;
             }
 

 
?>