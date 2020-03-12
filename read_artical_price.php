<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


 function getPrice() {
     
        $art_rice = $_SESSION['art_id'];
 
     
      $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
            mysqli_select_db($con, "web_shop");
            $query_ = mysqli_query($con, " SELECT price  FROM web_shop.articles where id = '".$art_rice."'; ") or die(mysqli_error($con));
            while ($row = mysqli_fetch_assoc($query_)) {
                  
                  $price = $row['price'];
            }
            return $price;
   }
 
    
?>